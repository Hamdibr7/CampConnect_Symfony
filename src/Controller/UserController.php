<?php

namespace App\Controller;
use App\Entity\Utilisateur;
use App\Form\UserType;
use App\Repository\UtilisateurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;

use Symfony\Component\HttpFoundation\Session\SessionInterface;

use Psr\Log\LoggerInterface;
#[Route('/utilisateur')]
 class UserController extends AbstractController
{
    #[Route(name: 'app_utilisateur_index', methods: ['GET'])]
    public function index(Request $request, UtilisateurRepository $utilisateurRepository): Response
    {
        // Vérification des droits d'administrateur
        $userData = $request->getSession()->get('user');
        if (!$userData || !isset($userData['isAdmin']) || $userData['isAdmin'] !== true) {
            // Rediriger vers la page de connexion si l'utilisateur n'est pas admin
            return $this->redirectToRoute('app_login');
        }
        
        return $this->render('user/index.html.twig', [
            'utilisateurs' => $utilisateurRepository->findAll(),
        ]);
    }

    #[Route('/login', name: 'app_login', methods: ['GET', 'POST'])]
public function login(Request $request, UtilisateurRepository $utilisateurRepository): Response
{
    if ($request->isMethod('POST')) {
        $email = $request->request->get('email');
        $password = $request->request->get('password');

        // Vérification pour compte administrateur
        if ($email === 'admincamp@gmail.com' && $password === 'campconnect2025') {
            // Recherche de l'utilisateur admin par email (au cas où il existe en base)
            $user = $utilisateurRepository->findOneBy(['email' => $email]);
            
            if ($user) {
                // Si l'administrateur existe en base, on utilise ses données
                $request->getSession()->set('user', [
                    'id' => $user->getId(),
                    'email' => $user->getEmail(),
                    'nom' => $user->getNom(),
                    'isAdmin' => true
                ]);
            } else {
                // Sinon on crée une session admin sans référence à un utilisateur en base
                $request->getSession()->set('user', [
                    'email' => 'admincamp@gmail.com',
                    'nom' => 'Administrateur',
                    'isAdmin' => true
                ]);
            }
            
            // Ajouter un message flash pour l'administrateur
            $this->addFlash('success', 'Bienvenue ! Vous êtes connecté en tant qu\'administrateur.');
            
            // Redirection vers la page d'index des utilisateurs
            return $this->redirectToRoute('app_utilisateur_index');
        }

        // Recherche de l'utilisateur standard par email
        $user = $utilisateurRepository->findOneBy(['email' => $email]);

        if ($user && $user->getMdp() === $password) {
            // Stocker l'utilisateur en session
            $request->getSession()->set('user', [
                'id' => $user->getId(),
                'email' => $user->getEmail(),
                'nom' => $user->getNom(),
                'isAdmin' => false
            ]);

            // Ajouter un message flash pour l'utilisateur standard
            $this->addFlash('success', 'Bienvenue ' . $user->getNom() . ' ! Vous êtes connecté à votre compte.');
            
            // Redirection vers la page d'accueil après connexion réussie
            return $this->redirectToRoute('app_home');
        } else {
            // Message d'erreur
            $this->addFlash('error', 'Email ou mot de passe incorrect');
        }
    }

    return $this->render('user/login.html.twig', [
        'last_email' => $request->request->get('email', '')
    ]);
}
    #[Route('/home', name: 'app_home')]
    public function home(Request $request, UtilisateurRepository $utilisateurRepository): Response
    {
        // Vérification de la session
        $session = $request->getSession();
        $userData = $session->get('user');
        
        if (!$userData) {
            return $this->redirectToRoute('app_login');
        }
    
        // Récupérer l'utilisateur complet depuis la base de données
        $user = $utilisateurRepository->find($userData['id']);
    
        return $this->render('user/home.html.twig', [
            'user' => $user
        ]);
    }
    
    #[Route('/logout', name: 'app_logout')]
    public function logout(Request $request): Response
    {
        // Supprimer l'utilisateur de la session
        $request->getSession()->remove('user');
        
        return $this->redirectToRoute('app_login');
    }


    #[Route('/new', name: 'app_utilisateur_new', methods: ['GET', 'POST'])]
    public function new(
        Request $request, 
        EntityManagerInterface $entityManager,
        SluggerInterface $slugger
    ): Response
    {
        $utilisateur = new Utilisateur();
        $form = $this->createForm(UserType::class, $utilisateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Gestion de l'upload de la photo de profil
            $pdpFile = $form->get('pdp')->getData();
            
            if ($pdpFile instanceof UploadedFile) {
                $originalFilename = pathinfo($pdpFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$pdpFile->guessExtension();

                try {
                    $pdpFile->move(
                        $this->getParameter('profile_directory'),
                        $newFilename
                    );
                    $utilisateur->setPdp($newFilename);
                } catch (FileException $e) {
                    // Gérer l'erreur si le déplacement du fichier échoue
                    $this->addFlash('error', 'Erreur lors de l\'upload de la photo de profil');
                }
            }

            $entityManager->persist($utilisateur);
            $entityManager->flush();

            return $this->redirectToRoute('app_utilisateur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('user/new.html.twig', [
            'utilisateur' => $utilisateur,
            'form' => $form->createView(),
        ]);
    }
    
    #[Route('/{id}', name: 'app_utilisateur_show', methods: ['GET'])]
    public function show(Utilisateur $utilisateur): Response
    {
        return $this->render('user/show.html.twig', [
            'utilisateur' => $utilisateur,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_utilisateur_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Utilisateur $utilisateur, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(UserType::class, $utilisateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_utilisateur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('user/edit.html.twig', [
            'utilisateur' => $utilisateur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_utilisateur_delete', methods: ['POST'])]
    public function delete(Request $request, Utilisateur $utilisateur, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$utilisateur->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($utilisateur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_utilisateur_index', [], Response::HTTP_SEE_OTHER);
    }
}