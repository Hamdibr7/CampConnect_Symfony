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
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Entity\Notification;
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
    
        // Récupérer les paramètres de recherche
        $query = $request->query->get('query');
        $filters = $request->query->all('filter');
    
        // Récupérer les relations d'amitié de l'utilisateur courant
        $amis = $amisRepository->findAmisWithDetails($currentUser->getId());
        $demandesEnvoyees = $amisRepository->findDemandesEnvoyees($currentUser->getId());
        $demandesRecues = $amisRepository->findDemandesRecues($currentUser->getId());
        $utilisateurs = $utilisateurRepository->findAllExceptCurrent($currentUser->getId());
    
      // Si une recherche est effectuée
if (!empty($query)) {
    // Si aucun filtre n'est sélectionné, activer tous les filtres par défaut
    $activeFilters = empty($filters) ? ['amis', 'demandes', 'invitations', 'nouveaux'] : $filters;
    
    // Filtrer les amis
    if (in_array('amis', $activeFilters)) {
        $amis = $this->filterUsersByQuery($amis, $query);
    } else {
        $amis = [];
    }
    
    // Filtrer les demandes reçues
    if (in_array('demandes', $activeFilters)) {
        $demandesRecues = $this->filterUsersByQuery($demandesRecues, $query);
    } else {
        $demandesRecues = [];
    }
    
    // Filtrer les demandes envoyées
    if (in_array('invitations', $activeFilters)) {
        $demandesEnvoyees = $this->filterUsersByQuery($demandesEnvoyees, $query);
    } else {
        $demandesEnvoyees = [];
    }
    
    // Filtrer les autres utilisateurs
    if (in_array('nouveaux', $activeFilters)) {
        $utilisateurs = $this->filterUsersByQuery($utilisateurs, $query);
    } else {
        $utilisateurs = [];
    }
} else if (!empty($filters)) {
    // Si des filtres sont sélectionnés mais pas de requête
    if (!in_array('amis', $filters)) $amis = [];
    if (!in_array('demandes', $filters)) $demandesRecues = [];
    if (!in_array('invitations', $filters)) $demandesEnvoyees = [];
    if (!in_array('nouveaux', $filters)) $utilisateurs = [];
}
        return $this->render('amis/index.html.twig', [
            'utilisateurs' => $utilisateurs,
            'user' => $currentUser ,// Ajoutez cette lign
            'demandesEnvoyees' => $demandesEnvoyees,
            'demandesRecues' => $demandesRecues,
            'amis' => $amis,
            'relationRepository' => $amisRepository, // Passer ici le repository des relations
            'currentUser' => $currentUser,
  
        ]);
    }
    
    /**
     * Filtre une liste d'objets Amis ou Utilisateur selon une requête de recherche
     */
   /**
 * Filtre une liste d'objets Amis ou Utilisateur selon un nom ou prénom
 */
private function filterUsersByQuery(array $items, string $query): array
{
    if (empty($query)) {
        return $items; // Si pas de requête, retourner tous les éléments
    }
    
    $query = strtolower(trim($query));
    
    return array_filter($items, function($item) use ($query) {
        // Pour les objets Amis
        if ($item instanceof Amis) {
            // Vérifier le demandeur
            $demandeur = $item->getDemandeur();
            if ($demandeur instanceof Utilisateur) {
                $prenomDemandeur = strtolower($demandeur->getPrenom() ?? '');
                $nomDemandeur = strtolower($demandeur->getNom() ?? '');
                
                if (strpos($prenomDemandeur, $query) !== false || strpos($nomDemandeur, $query) !== false) {
                    return true;
                }
            }
            
            // Vérifier le destinataire
            $destinataire = $item->getDestinataire();
            if ($destinataire instanceof Utilisateur) {
                $prenomDestinataire = strtolower($destinataire->getPrenom() ?? '');
                $nomDestinataire = strtolower($destinataire->getNom() ?? '');
                
                if (strpos($prenomDestinataire, $query) !== false || strpos($nomDestinataire, $query) !== false) {
                    return true;
                }
            }
            
            return false;
        } 
        // Pour les objets Utilisateur
        else if ($item instanceof Utilisateur) {
            $prenom = strtolower($item->getPrenom() ?? '');
            $nom = strtolower($item->getNom() ?? '');
            
            return strpos($prenom, $query) !== false || strpos($nom, $query) !== false;
        }
        
        return false;
    });

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
        
       
    // Créer la notification pour l'utilisateur demandeur
  //  $message = $demande->getDestinataire()->getPrenom() . ' ' . $demande->getDestinataire()->getNom() . ' a accepté votre invitation.';
    //$notification = new Notification($message, $demande->getDemandeur());

    // Sauvegarder la notification dans la base de données
   // $entityManager->persist($notification);
  //  $entityManager->flush();



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
    #[Route('/amis/retirer/{id}', name: 'app_amis_retirer')]
public function retirer(Request $request, Amis $relation, EntityManagerInterface $entityManager, UtilisateurRepository $utilisateurRepository): Response
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

    // Vérifier que l'utilisateur est bien impliqué dans cette relation d'amitié
    if ($relation->getDemandeur()->getId() !== $currentUser->getId() && $relation->getDestinataire()->getId() !== $currentUser->getId()) {
        throw $this->createAccessDeniedException('Vous n\'avez pas l\'autorisation de supprimer cette relation');
    }

    // Supprimer la relation d'amitié complètement
    $entityManager->remove($relation);
    $entityManager->flush();

    $this->addFlash('success', 'Cet utilisateur a été retiré de vos amis');

    return $this->redirectToRoute('app_amis');
}
    




}