<?php

namespace App\Controller;

use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UtilisateurRepository;
use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManagerInterface;
use App\Service\PasswordHashService;

class GoogleController extends AbstractController
{
    #[Route('/connect/google', name: 'connect_google')]
    public function connectAction(ClientRegistry $clientRegistry): Response
    {
        return $clientRegistry
            ->getClient('google')
            ->redirect([
                'email', 'profile' // Les scopes demandés
            ]);
    }

    #[Route('/connect/google/check', name: 'connect_google_check')]
    public function connectCheckAction(
        Request $request, 
        ClientRegistry $clientRegistry, 
        UtilisateurRepository $utilisateurRepository, 
        EntityManagerInterface $entityManager,
        PasswordHashService $passwordHashService
    ): Response {
        try {
            // Récupérer le client et l'utilisateur Google
            $client = $clientRegistry->getClient('google');
         
             $googleUser = $client->fetchUser(['state' => false]);


            // Récupérer les données de l'utilisateur Google
            $googleId = $googleUser->getId();
            $email = $googleUser->getEmail();
            $nom = $googleUser->getLastName() ?: 'Utilisateur'; // Valeur par défaut
            $prenom = $googleUser->getFirstName() ?: 'Google'; // Valeur par défaut
            
            // Chercher l'utilisateur par googleId d'abord (le plus précis)
            $utilisateur = $utilisateurRepository->findOneBy(['googleId' => $googleId]);
            
            // Si pas trouvé, chercher par email
            if (!$utilisateur) {
                $utilisateur = $utilisateurRepository->findOneBy(['email' => $email]);
            }

            // Si toujours pas trouvé, créer un nouvel utilisateur
            if (!$utilisateur) {
                $utilisateur = new Utilisateur();
                $utilisateur->setEmail($email);
                $utilisateur->setNom($nom);
                $utilisateur->setPrenom($prenom);
                $utilisateur->setGoogleId($googleId);
                $utilisateur->setAuthProvider('google');
                
                // Générer un mot de passe aléatoire (ils utiliseront Google pour se connecter)
                $randomPassword = bin2hex(random_bytes(12));
                $hashedPassword = $passwordHashService->hashPassword($utilisateur, $randomPassword);
                $utilisateur->setMdp($hashedPassword);
                
                $entityManager->persist($utilisateur);
                $entityManager->flush();
                
                $this->addFlash('success', 'Votre compte a été créé avec succès via Google!');
            } 
            // Si l'utilisateur existe mais n'a pas de googleId, mettre à jour
            elseif (!$utilisateur->getGoogleId()) {
                $utilisateur->setGoogleId($googleId);
                $utilisateur->setAuthProvider('google');
                $entityManager->flush();
            }

            // Connecter l'utilisateur (stocker en session)
            $request->getSession()->set('user', [
                'id' => $utilisateur->getId(),
                'email' => $utilisateur->getEmail(),
                'nom' => $utilisateur->getNom(),
                'prenom' => $utilisateur->getPrenom(),
                'isAdmin' => false,
                'googleUser' => true  // Indicateur pour le frontend
            ]);

            $this->addFlash('success', 'Connexion réussie via Google! Bienvenue ' . $utilisateur->getPrenom() . '.');
            return $this->redirectToRoute('app_front_home');

        } catch (IdentityProviderException $e) {
            $this->addFlash('error', 'Erreur lors de la connexion avec Google: ' . $e->getMessage());
            return $this->redirectToRoute('app_login');
        }
    }
}