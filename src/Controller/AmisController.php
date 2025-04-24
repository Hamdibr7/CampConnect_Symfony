<?php

namespace App\Controller;

use App\Entity\Amis;
use App\Entity\Utilisateur;
use App\Repository\AmisRepository;
use App\Repository\UtilisateurRepository;
use App\Repository\NotificationRepository;
use App\Service\NotificationService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Entity\Notification;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mercure\HubInterface;
use Symfony\Component\Mercure\Update;
class AmisController extends AbstractController
{
    private EntityManagerInterface $entityManager;
    private NotificationService $notificationService;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        //$this->notificationService = $notificationService
    }
    
    private function sortUsersByAge(array $items, string $direction = 'asc'): array
{
    usort($items, function($a, $b) use ($direction) {
        // Obtenir l'âge selon le type d'objet
        if ($a instanceof Amis) {
            $aAge = $a->getDemandeur()->getAge() ?? 0;
        } else {
            $aAge = $a->getAge() ?? 0;
        }
        
        if ($b instanceof Amis) {
            $bAge = $b->getDemandeur()->getAge() ?? 0;
        } else {
            $bAge = $b->getAge() ?? 0;
        }
        
        // Comparer les âges
        $compareAge = $aAge - $bAge;
        return $direction === 'asc' ? $compareAge : -$compareAge;
    });
    
    return $items;
}
    
    #[Route('/amis', name: 'app_amis')]
public function index(Request $request, AmisRepository $amisRepository, UtilisateurRepository $utilisateurRepository): Response
{
    $session = $request->getSession();
    $userData = $session->get('user');
    
    // Récupérer les paramètres de filtrage et tri
    $letterFilter = $request->query->get('letter', ''); // Filtre par lettre
    $sortDirection = $request->query->get('sort', 'asc'); // Direction du tri (asc ou desc)
    $listType = $request->query->get('list', 'all'); // Type de liste à filtrer (all, amis, demandes, invitations, nouveaux)
    $sortBy = $request->query->get('sortBy', 'name'); // Critère de tri (name ou age)
    
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
    
    // Appliquer le filtre par lettre si nécessaire selon le type de liste
    if (!empty($letterFilter)) {
        if ($listType === 'all' || $listType === 'amis') {
            $amis = $this->filterUsersByFirstLetter($amis, $letterFilter);
        }
        if ($listType === 'all' || $listType === 'invitations') {
            $demandesEnvoyees = $this->filterUsersByFirstLetter($demandesEnvoyees, $letterFilter);
        }
        if ($listType === 'all' || $listType === 'demandes') {
            $demandesRecues = $this->filterUsersByFirstLetter($demandesRecues, $letterFilter);
        }
        if ($listType === 'all' || $listType === 'nouveaux') {
            $utilisateurs = $this->filterUsersByFirstLetter($utilisateurs, $letterFilter);
        }
    }
    
    // Trier les listes selon le critère et la direction de tri
    if ($listType === 'all' || $listType === 'amis') {
        $amis = $sortBy === 'age' ? $this->sortUsersByAge($amis, $sortDirection) : $this->sortUsersByName($amis, $sortDirection);
    }
    if ($listType === 'all' || $listType === 'invitations') {
        $demandesEnvoyees = $sortBy === 'age' ? $this->sortUsersByAge($demandesEnvoyees, $sortDirection) : $this->sortUsersByName($demandesEnvoyees, $sortDirection);
    }
    if ($listType === 'all' || $listType === 'demandes') {
        $demandesRecues = $sortBy === 'age' ? $this->sortUsersByAge($demandesRecues, $sortDirection) : $this->sortUsersByName($demandesRecues, $sortDirection);
    }
    if ($listType === 'all' || $listType === 'nouveaux') {
        $utilisateurs = $sortBy === 'age' ? $this->sortUsersByAge($utilisateurs, $sortDirection) : $this->sortUsersByName($utilisateurs, $sortDirection);
    }

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
        'user' => $currentUser,
        'demandesEnvoyees' => $demandesEnvoyees,
        'demandesRecues' => $demandesRecues,
        'amis' => $amis,
        'relationRepository' => $amisRepository,
        'currentUser' => $currentUser,
        'letterFilter' => $letterFilter,
        'sortDirection' => $sortDirection,
        'sortBy' => $sortBy,
        'listType' => $listType,
        'alphabet' => range('A', 'Z'),
    ]);
}
    /**
     * Filtre une liste d'objets Amis ou Utilisateur selon la première lettre du prénom ou nom
     */
    private function filterUsersByFirstLetter(array $items, string $letter): array
    {
        if (empty($letter)) {
            return $items; // Si pas de lettre spécifiée, retourner tous les éléments
        }
        
        $letter = strtoupper($letter);
        
        return array_filter($items, function($item) use ($letter) {
            // Pour les objets Amis
            if ($item instanceof Amis) {
                // Vérifier si l'un des utilisateurs (demandeur ou destinataire) correspond au filtre de lettre
                $demandeur = $item->getDemandeur();
                $destinataire = $item->getDestinataire();
                
                // Vérifier le demandeur
                if ($demandeur instanceof Utilisateur) {
                    $prenomDemandeur = $demandeur->getPrenom() ?? '';
                    $nomDemandeur = $demandeur->getNom() ?? '';
                    
                    if (strtoupper(substr($prenomDemandeur, 0, 1)) === $letter || 
                        strtoupper(substr($nomDemandeur, 0, 1)) === $letter) {
                        return true;
                    }
                }
                
                // Vérifier le destinataire
                if ($destinataire instanceof Utilisateur) {
                    $prenomDestinataire = $destinataire->getPrenom() ?? '';
                    $nomDestinataire = $destinataire->getNom() ?? '';
                    
                    if (strtoupper(substr($prenomDestinataire, 0, 1)) === $letter || 
                        strtoupper(substr($nomDestinataire, 0, 1)) === $letter) {
                        return true;
                    }
                }
                
                return false;
            } 
            // Pour les objets Utilisateur
            else if ($item instanceof Utilisateur) {
                $prenom = $item->getPrenom() ?? '';
                $nom = $item->getNom() ?? '';
                
                return strtoupper(substr($prenom, 0, 1)) === $letter || 
                       strtoupper(substr($nom, 0, 1)) === $letter;
            }
            
            return false;
        });
    }
    
    /**
     * Trie une liste d'objets Amis ou Utilisateur par nom/prénom
     */
    private function sortUsersByName(array $items, string $direction = 'asc'): array
    {
        usort($items, function($a, $b) use ($direction) {
            // Obtenir le nom et prénom selon le type d'objet
            if ($a instanceof Amis) {
                $aNom = $a->getDemandeur()->getNom() ?? '';
                $aPrenom = $a->getDemandeur()->getPrenom() ?? '';
            } else {
                $aNom = $a->getNom() ?? '';
                $aPrenom = $a->getPrenom() ?? '';
            }
            
            if ($b instanceof Amis) {
                $bNom = $b->getDemandeur()->getNom() ?? '';
                $bPrenom = $b->getDemandeur()->getPrenom() ?? '';
            } else {
                $bNom = $b->getNom() ?? '';
                $bPrenom = $b->getPrenom() ?? '';
            }
            
            // Comparer les prénoms d'abord
            $comparePrenom = strcasecmp($aPrenom, $bPrenom);
            
            // Si les prénoms sont identiques, comparer les noms
            if ($comparePrenom === 0) {
                $compareNom = strcasecmp($aNom, $bNom);
                return $direction === 'asc' ? $compareNom : -$compareNom;
            }
            
            return $direction === 'asc' ? $comparePrenom : -$comparePrenom;
        });
        
        return $items;
    }
    
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

    // Les autres méthodes du contrôleur restent inchangées
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

         // Créer une notification pour le destinataire
         $message = $currentUser->getPrenom() . ' ' . $currentUser->getNom() . ' vous a envoyé une demande d\'ami';
        
         // Créer la notification directement sans utiliser le service
         $notification = new Notification($message, $destinataire);
         $entityManager->persist($notification);
         
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
        // Méthode inchangée
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

         
        
        $demandeur = $demande->getDemandeur();
        
      
        
         // Créer une notification pour le destinataire
         $message = $currentUser->getPrenom() . ' ' . $currentUser->getNom() . ' a accepté votre demande d\'ami';

        
         // Créer la notification directement sans utiliser le service
         $notification = new Notification($message, $demandeur);
         $entityManager->persist($notification);
         
        
        $notification = new Notification($message, $demandeur);
       
        $entityManager->flush();

        $this->addFlash('success', 'Invitation acceptée');

        return $this->redirectToRoute('app_amis');
          
 
    }

    #[Route('/amis/refuser/{id}', name: 'app_amis_refuser')]
    public function refuser(Request $request, Amis $demande, EntityManagerInterface $entityManager, UtilisateurRepository $utilisateurRepository): Response
    {
        // Méthode inchangée
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
        // Méthode inchangée
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
   
    #[Route('/notifications', name: 'app_notifications')]
    public function notifications(Request $request, NotificationRepository $notificationRepo, UtilisateurRepository $utilisateurRepository): Response
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
      
        // Obtenir les notifications de l'utilisateur
        $notifications = $notificationRepo->findBy([
            'utilisateur' =>  $currentUser->getId(), 
        ], ['date_creation' => 'DESC']);
        
     // Préparer les données des émetteurs
    $emetteurs = [];
    foreach ($notifications as $notification) {
        // Extraire le nom de l'émetteur du message
        if (preg_match('/^([A-Za-z]+) ([A-Za-z]+) (vous a|a accepté)/', $notification->getMessage(), $matches)) {
            $prenom = $matches[1];
            $nom = $matches[2];
            
            // Rechercher l'utilisateur correspondant
            $emetteur = $utilisateurRepository->findOneBy([
                'prenom' => $prenom,
                'nom' => $nom
            ]);
            
            if ($emetteur) {
                $emetteurs[$notification->getId()] = $emetteur;
            }
        }
    }
    
    return $this->render('notifications.html.twig', [
        'notifications' => $notifications,
        'emetteurs' => $emetteurs,
        'currentUser' => $currentUser
    ]);
}
    #[Route('/notification/mark-as-read/{id}', name: 'app_notification_mark_as_read')]
public function markAsRead(Notification $notification, EntityManagerInterface $entityManager): Response
{
    if (!$notification->isRead()) {
        $notification->setIsRead(true);
        $entityManager->flush();
    }
    
    return $this->redirectToRoute('app_notifications');
}


}