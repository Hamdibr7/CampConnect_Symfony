<?php

namespace App\Controller;

use App\Entity\Amis;
use App\Entity\Utilisateur;
use App\Repository\AmisRepository;
use App\Repository\UtilisateurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AmisController extends AbstractController
{
    #[Route('/amis', name: 'app_amis')]
    
    public function index(Request $request, AmisRepository $amisRepository, UtilisateurRepository $utilisateurRepository): Response
    {
        $session = $request->getSession();
        $userData = $session->get('user');

        if (!$userData) {
            return $this->redirectToRoute('app_login');
        }

        $currentUser = $utilisateurRepository->find($userData['id']);
        if (!$currentUser) {
            throw $this->createNotFoundException('Utilisateur non trouvé');
        }
 // Utilisation de la méthode améliorée findAmisWithDetails pour obtenir les détails des amis
 $amis = $amisRepository->findAmisWithDetails($currentUser->getId());
 $demandesEnvoyees = $amisRepository->findDemandesEnvoyees($currentUser->getId());
 $demandesRecues = $amisRepository->findDemandesRecues($currentUser->getId());
 $utilisateurs = $utilisateurRepository->findAllExceptCurrent($currentUser->getId());

        return $this->render('amis/index.html.twig', [
            'utilisateurs' => $utilisateurs,
            'demandesEnvoyees' => $demandesEnvoyees,
            'demandesRecues' => $demandesRecues,
            'amis' => $amis,
            'relationRepository' => $amisRepository ,// Passer ici le repository des relations
            'currentUser' => $currentUser
        
        ]);
    }

    #[Route('/amis/inviter/{id}', name: 'app_amis_inviter')]
    public function inviter(Request $request, Utilisateur $destinataire, EntityManagerInterface $entityManager, AmisRepository $amisRepository, UtilisateurRepository $utilisateurRepository): Response
    {
        $session = $request->getSession();
        $userData = $session->get('user');
    
        if (!$userData) {
            return $this->redirectToRoute('app_login');
        }
    
        // Récupérer l'utilisateur actuel à partir de la session
        $currentUser = $utilisateurRepository->find($userData['id']);
        if (!$currentUser) {
            throw $this->createNotFoundException('Utilisateur non trouvé');
        }
    
        // Vérifier s'il existe déjà une demande entre les deux utilisateurs
        $demandeExistante = $amisRepository->findDemande($currentUser->getId(), $destinataire->getId());
    
        if (!$demandeExistante) {
            // Créer une nouvelle demande d'ami
            $demande = new Amis();
            $demande->setDemandeur($currentUser);  // Associe l'utilisateur actuel comme demandeur
            $demande->setDestinataire($destinataire);  // Associe l'utilisateur sélectionné comme destinataire
            $demande->setDateAjout(new \DateTime());
            $demande->setStatus('attente');
    
            // Persister la demande dans la base de données
            $entityManager->persist($demande);
            $entityManager->flush();
    
            // Afficher un message flash pour indiquer que l'invitation a été envoyée
            $this->addFlash('success', 'Invitation envoyée à ' . $destinataire->getPrenom() . ' ' . $destinataire->getNom());
        } else {
            // Afficher un message flash si la demande existe déjà
            $this->addFlash('info', 'Une demande existe déjà avec cet utilisateur');
        }
    
        // Rediriger l'utilisateur vers la page de gestion des amis
        return $this->redirectToRoute('app_amis');
    }
    
    #[Route('/amis/accepter/{id}', name: 'app_amis_accepter')]
    public function accepter(Request $request, Amis $demande, EntityManagerInterface $entityManager, UtilisateurRepository $utilisateurRepository): Response
    {
        $session = $request->getSession();
        $userData = $session->get('user');

        if (!$userData) {
            return $this->redirectToRoute('app_login');
        }

        $currentUser = $utilisateurRepository->find($userData['id']);
        if (!$currentUser) {
            throw $this->createNotFoundException('Utilisateur non trouvé');
        }

        if ($demande->getUtilisateurid2() !== $currentUser->getId()) {
            throw $this->createAccessDeniedException('Vous n\'avez pas l\'autorisation d\'accepter cette invitation');
        }

        $demande->setStatus('amis');
        $entityManager->flush();

        $this->addFlash('success', 'Invitation acceptée');

        return $this->redirectToRoute('app_amis');
    }

    #[Route('/amis/refuser/{id}', name: 'app_amis_refuser')]
    public function refuser(Request $request, Amis $demande, EntityManagerInterface $entityManager, UtilisateurRepository $utilisateurRepository): Response
    {
        $session = $request->getSession();
        $userData = $session->get('user');

        if (!$userData) {
            return $this->redirectToRoute('app_login');
        }

        $currentUser = $utilisateurRepository->find($userData['id']);
        if (!$currentUser) {
            throw $this->createNotFoundException('Utilisateur non trouvé');
        }

        if ($demande->getUtilisateurid2() !== $currentUser->getId()) {
            throw $this->createAccessDeniedException('Vous n\'avez pas l\'autorisation de refuser cette invitation');
        }

        $demande->setStatus('refusé');
        $entityManager->flush();

        $this->addFlash('info', 'Invitation refusée');

        return $this->redirectToRoute('app_amis');
    }
}
