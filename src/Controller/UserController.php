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

use App\Service\UserSessionService;
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
        $rememberMe = $request->request->has('_remember_me');
        
        // Définir la durée de la session en fonction de "Se souvenir de moi"
        $session = $request->getSession();
        if ($rememberMe) {
            // Configure la session pour durer 30 jours
            $session->migrate(true, 2592000); // 30 jours en secondes
        }

        // Vérification pour compte administrateur
        if ($email === 'admincamp@gmail.com' && $password === 'campconnect2025') {
            // Recherche de l'utilisateur admin par email (au cas où il existe en base)
            $user = $utilisateurRepository->findOneBy(['email' => $email]);
            
            if ($user) {
                // Si l'administrateur existe en base, on utilise ses données
                $session->set('user', [
                    'id' => $user->getId(),
                    'email' => $user->getEmail(),
                    'nom' => $user->getNom(),
                    'isAdmin' => true
                ]);
            } else {
                // Sinon on crée une session admin sans référence à un utilisateur en base
                $session->set('user', [
                    'email' => 'admincamp@gmail.com',
                    'nom' => 'Administrateur',
                    'isAdmin' => true
                ]);
            }
            
            
            
            // Redirection vers la page d'index des utilisateurs
            return $this->redirectToRoute('app_front_home');
        }

        // Recherche de l'utilisateur standard par email
        $user = $utilisateurRepository->findOneBy(['email' => $email]);

        if ($user && $user->getMdp() === $password) {
            // Stocker l'utilisateur en session
            $session->set('user', [
                'id' => $user->getId(),
                'email' => $user->getEmail(),
                'nom' => $user->getNom(),
                'isAdmin' => false
            ]);
  
            // Redirection vers le frontoffice au lieu du dashboard
           
            // Redirection vers la page FrontOffice/index.html.twig
            return $this->redirectToRoute('app_front_home');
        } else {
            // Message d'erreur
            $this->addFlash('error', 'Email ou mot de passe incorrect');
        }
    }

    return $this->render('user/login.html.twig', [
        'last_email' => $request->request->get('email', '')
    ]);
    }
    #[Route('/front', name: 'app_front_home')]
    public function frontHome(Request $request, UtilisateurRepository $utilisateurRepository): Response
    {
        $session = $request->getSession();
        $userData = $session->get('user');
        
        if (!$userData) {
            return $this->redirectToRoute('app_login');
        }
    
        // Si c'est l'admin, on crée un objet utilisateur minimal
        if ($userData['isAdmin'] ?? false) {
            $user = [
                'nom' => 'Administrateur',
                'prenom' => '',
                'email' => $userData['email'],
                'isAdmin' => true
            ];
        } else {
            // Pour les utilisateurs normaux
            $user = $utilisateurRepository->find($userData['id']);
            if (!$user) {
                $session->remove('user');
                return $this->redirectToRoute('app_login');
            }
        }
    
        return $this->render('FrontOffice/index.html.twig', [
            'user' => $user
        ]);
    }

    #[Route('/home', name: 'app_home')]
    public function home(Request $request, UtilisateurRepository $utilisateurRepository): Response
    {
        // Vérification de la session
        //$user = $userSessionService->getUser();
        $session = $request->getSession();
        $userData = $session->get('user');
        
        if (!$userData) {
            return $this->redirectToRoute('app_login');
        }
    
        // Récupérer l'utilisateur complet depuis la base de données
        $user = $utilisateurRepository->find($userData['id']);
     // Si l'utilisateur n'existe plus en base de données
     if (!$user) {
        $session->remove('user'); // Nettoyer la session
        return $this->redirectToRoute('app_login');
    }

        return $this->render('FrontOffice/index.html.twig', [
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

    #[Route('/{id}/suppression', name: 'app_utilisateur_suppression', methods: ['GET'])]
    public function suppression(Request $request, Utilisateur $utilisateur, EntityManagerInterface $entityManager): Response
    {
        // Supprimer l'utilisateur sans vérification CSRF
        $entityManager->remove($utilisateur);
        $entityManager->flush();
        
        // Toujours déconnecter l'utilisateur après suppression
        $request->getSession()->remove('user');
        
        // Ajouter un message flash pour informer l'utilisateur
        $this->addFlash('success', 'Votre compte a été supprimé avec succès.');
        
        // Rediriger vers la page de connexion
        return $this->redirectToRoute('app_login');
    }
    #[Route('/{id}/delete', name: 'app_utilisateur_delete_from_index', methods: ['GET'])]
public function deleteFromIndex(Utilisateur $utilisateur, EntityManagerInterface $entityManager): Response
{
    $entityManager->remove($utilisateur);
    $entityManager->flush();

   
    
    return $this->redirectToRoute('app_utilisateur_index');
}

}