<?php

namespace App\Controller;
use App\Entity\Utilisateur;
use App\Form\UserType;
use App\Repository\NotificationRepository;
use App\Entity\Notification;
use App\Repository\UtilisateurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use App\Service\UserSessionService;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Service\PasswordHashService;
use GuzzleHttp\Client;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Http\Attribute\IsGranted;
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
 
// Méthode login modifiée
#[Route('/login', name: 'app_login', methods: ['GET', 'POST'])]
public function login(Request $request, UtilisateurRepository $utilisateurRepository, PasswordHashService $passwordHashService): Response
{
    if ($request->isMethod('POST')) {
        // Vérification reCAPTCHA
        $recaptchaResponse = $request->request->get('g-recaptcha-response');
        $recaptchaSecret = '6Lck0hYrAAAAAIIJgVW1sOFdirYVO1mS3Lkp1Ppj'; // ⚠️ Remplace par ta vraie clé secrète
        $client = new Client();

        $response = $client->request('POST', 'https://www.google.com/recaptcha/api/siteverify', [
            'form_params' => [
                'secret' => $recaptchaSecret,
                'response' => $recaptchaResponse,
                'remoteip' => $request->getClientIp(),
            ]
        ]);

        $result = json_decode($response->getBody(), true);

        if (!$result['success']) {
            $this->addFlash('error', 'Veuillez confirmer que vous n\'êtes pas un robot.');
            return $this->redirectToRoute('app_login');
        }

        // Suite login standard
        $email = $request->request->get('email');
        $password = $request->request->get('password');
        $rememberMe = $request->request->has('_remember_me');

        $session = $request->getSession();
        if ($rememberMe) {
            $session->migrate(true, 2592000); // 30 jours
        }

        if ($email === 'admincamp@gmail.com' && $password === 'campconnect2025') {
            $session->set('user', [
                'email' => 'admincamp@gmail.com',
                'nom' => 'Administrateur',
                'isAdmin' => true
            ]);
            $this->addFlash('success', 'Bienvenue, Administrateur !');
            return $this->redirectToRoute('app_front_home');
        }

        $user = $utilisateurRepository->findOneBy(['email' => $email]);

        if ($user && $passwordHashService->isPasswordValid($user, $password)) {
            $session->set('user', [
                'id' => $user->getId(),
                'email' => $user->getEmail(),
                'nom' => $user->getNom(),
                'isAdmin' => false
            ]);
            $this->addFlash('success', 'Connexion réussie ! Bienvenue ' . $user->getPrenom() . '.');
            return $this->redirectToRoute('app_front_home');
        } else {
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
            'user' => $user,
           
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
          // Ajouter un message flash de déconnexion réussie
    $this->addFlash('success', 'Vous avez été déconnecté avec succès.');
        return $this->redirectToRoute('app_login');
    }

    #[Route('/new', name: 'app_utilisateur_new', methods: ['GET', 'POST'])]
    public function new(
        Request $request, 
        EntityManagerInterface $entityManager,
        SluggerInterface $slugger,
        PasswordHashService $passwordHashService
    ): Response
    {
        $utilisateur = new Utilisateur();
        $form = $this->createForm(UserType::class, $utilisateur);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            // Hashage du mot de passe avant de sauvegarder
           
            $plainPassword = $utilisateur->getMdp();
            $hashedPassword = $passwordHashService->hashPassword($utilisateur, $plainPassword);
            $utilisateur->setMdp($hashedPassword);
            
            // Gestion de l'upload de la photo de profil
            $pdpFile = $form->get('pdp')->getData();
            
            if ($pdpFile instanceof UploadedFile) {
                $originalFilename = pathinfo($pdpFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $pdpFile->guessExtension();
            
                try {
                    $pdpFile->move(
                        $this->getParameter('profile_directory'), // Utilise BIEN 'profile_directory' ici
                        $newFilename
                    );
                } catch (FileException $e) {
                    $this->addFlash('error', 'Erreur lors du téléchargement de l\'image.');
                }
            
                // On stocke le nom du fichier dans la base de données
                $utilisateur->setPdp($newFilename);
            }
            
    
            $entityManager->persist($utilisateur);
            $entityManager->flush();
            $this->addFlash('success', 'Votre compte a été créé avec succès. Vous pouvez maintenant vous connecter.');
            return $this->redirectToRoute('app_utilisateur_index', [], Response::HTTP_SEE_OTHER);
        }
       // $this->addFlash('error', 'Veuillez corriger les erreurs dans le formulaire.');
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
    #[Route('/{id}/edit', name: 'app_utilisateur_edit', methods: ['GET', 'POST'])]#[Route('/{id}/edit', name: 'app_utilisateur_edit', methods: ['GET', 'POST'])]
    public function edit(
        Request $request,
        Utilisateur $utilisateur,
        EntityManagerInterface $entityManager,
        SluggerInterface $slugger,
        PasswordHashService $passwordHashService,
        UtilisateurRepository $utilisateurRepository
    ): Response {
        $session = $request->getSession();
        $userData = $session->get('user');
    
        if (!$userData) {
            return $this->redirectToRoute('app_login');
        }
    
        $currentUser = $utilisateurRepository->find($userData['id']);
        if (!$currentUser) {
            throw $this->createNotFoundException('Utilisateur non trouvé');
        }
    
        // Sauvegarder le mot de passe actuel (hashé) et la photo de profil actuelle
        $currentPasswordHash = $utilisateur->getMdp();
        $currentPhoto = $utilisateur->getPdp();
    
        // Vider le champ mot de passe pour ne pas afficher le hash dans le formulaire
        $utilisateur->setMdp('');
    
        $form = $this->createForm(UserType::class, $utilisateur);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            // Gérer le mot de passe
            $newPassword = $utilisateur->getMdp();
            if (empty($newPassword)) {
                $utilisateur->setMdp($currentPasswordHash);
            } else {
                $hashedPassword = $passwordHashService->hashPassword($utilisateur, $newPassword);
                $utilisateur->setMdp($hashedPassword);
            }
    
            // Gérer l'image de profil
            $pdpFile = $form->get('pdp')->getData();
    
            if ($pdpFile instanceof UploadedFile) {
                $originalFilename = pathinfo($pdpFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $pdpFile->guessExtension();
    
                try {
                    // Supprimer l'ancienne image si elle existe
                    if ($currentPhoto && file_exists($this->getParameter('profile_directory') . '/' . $currentPhoto)) {
                        unlink($this->getParameter('profile_directory') . '/' . $currentPhoto);
                    }
    
                    // Enregistrer la nouvelle image
                    $pdpFile->move(
                        $this->getParameter('profile_directory'),
                        $newFilename
                    );
                    $utilisateur->setPdp($newFilename);
                } catch (FileException $e) {
                    $this->addFlash('error', 'Erreur lors du téléchargement de la nouvelle image de profil.');
                }
            } else {
                // Si aucune nouvelle image n'est envoyée, conserver l'ancienne
                $utilisateur->setPdp($currentPhoto);
            }
    
            $entityManager->flush();
    
            $this->addFlash('success', 'Votre profil a été mis à jour avec succès.');
            return $this->redirectToRoute('app_front_home');
        }
    
        return $this->render('user/edit.html.twig', [
            'utilisateur' => $utilisateur,
            'form' => $form->createView(),
            'currentUser' => $currentUser,
            'user' => $currentUser,
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
        
      // Ajouter un message flash avec un ton plus décontracté
$this->addFlash('success', 'C’est triste de vous voir partir... Votre compte a été supprimé avec succès.');

        
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