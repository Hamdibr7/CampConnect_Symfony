<?php

namespace App\Controller;

use App\Entity\Amis;
use App\Entity\Utilisateur;
use App\Entity\Notification;
use App\Repository\AmisRepository;
use App\Repository\UtilisateurRepository;
use App\Repository\NotificationRepository;
use App\Service\NotificationService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mercure\HubInterface;
use Symfony\Component\Mercure\Update;

class AmisController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/amis', name: 'app_amis', methods: ['GET'])]
    public function index(Request $request, AmisRepository $amisRepository, UtilisateurRepository $utilisateurRepository): Response
    {
        $session = $request->getSession();
        $userData = $session->get('user');

        // Récupérer les paramètres de filtrage et tri
        $letterFilter = $request->query->get('letter', '');
        $sortDirection = $request->query->get('sort', 'asc');
        $listType = $request->query->get('list', 'all');
        $sortBy = $request->query->get('sortBy', 'name');
        $query = $request->query->get('query');
        $filters = $request->query->all('filter') ?: [];

        if (!$userData) {
            return $this->redirectToRoute('app_login');
        }

        $currentUser = $utilisateurRepository->find($userData['id']);
        if (!$currentUser) {
            throw $this->createNotFoundException('Utilisateur non trouvé');
        }

        // Récupérer les relations d'amitié de l'utilisateur courant
        $amis = $amisRepository->findAmisWithDetails($currentUser->getId());
        $demandesEnvoyees = $amisRepository->findDemandesEnvoyees($currentUser->getId());
        $demandesRecues = $amisRepository->findDemandesRecues($currentUser->getId());

        // Récupérer les utilisateurs pour la section "Découvrir" avec tri et filtres
        $utilisateurs = $utilisateurRepository->findUtilisateursForAmis(
            $currentUser->getId(),
            $query,
            $filters,
            $letterFilter,
            $sortBy,
            $sortDirection
        );

        // Appliquer le filtre par lettre si nécessaire
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
            // Le filtre par lettre pour utilisateurs est déjà géré dans findUtilisateursForAmis
        }

        // Si une recherche est effectuée
        if (!empty($query)) {
            $activeFilters = empty($filters) ? ['amis', 'demandes', 'invitations', 'nouveaux'] : $filters;

            if (!in_array('amis', $activeFilters)) {
                $amis = [];
            } else {
                $amis = $this->filterUsersByQuery($amis, $query);
            }

            if (!in_array('demandes', $activeFilters)) {
                $demandesRecues = [];
            } else {
                $demandesRecues = $this->filterUsersByQuery($demandesRecues, $query);
            }

            if (!in_array('invitations', $activeFilters)) {
                $demandesEnvoyees = [];
            } else {
                $demandesEnvoyees = $this->filterUsersByQuery($demandesEnvoyees, $query);
            }

            // Le filtrage par query pour utilisateurs est déjà géré dans findUtilisateursForAmis
            if (!in_array('nouveaux', $activeFilters)) {
                $utilisateurs = [];
            }
        } else if (!empty($filters)) {
            if (!in_array('amis', $filters)) $amis = [];
            if (!in_array('demandes', $filters)) $demandesRecues = [];
            if (!in_array('invitations', $filters)) $demandesEnvoyees = [];
            if (!in_array('nouveaux', $filters)) $utilisateurs = [];
        }

      // Si c'est une requête AJAX, retourner une réponse JSON
if ($request->isXmlHttpRequest() || $request->query->get('_ajax')) {
    $amisData = [];
    foreach ($amis as $ami) {
        $ami_user = $ami->getUtilisateurid1() === $currentUser->getId() ? $ami->getDestinataire() : $ami->getDemandeur();
        $amisData[] = [
            'id' => $ami_user->getId(),
            'prenom' => $ami_user->getPrenom(),
            'nom' => $ami_user->getNom(),
            'age' => $ami_user->getAge(),
            'pdp' => $ami_user->getPdp(),
            'relation' => [
                'id' => $ami->getId(),
                'status' => $ami->getStatus(),
                'utilisateurid1' => $ami->getUtilisateurid1(),
            ],
        ];
    }

    $demandesRecuesData = [];
    foreach ($demandesRecues as $demande) {
        $demandeur = $demande->getDemandeur();
        $demandesRecuesData[] = [
            'id' => $demandeur->getId(),
            'prenom' => $demandeur->getPrenom(),
            'nom' => $demandeur->getNom(),
            'age' => $demandeur->getAge(),
            'pdp' => $demandeur->getPdp(),
            'relation' => [
                'id' => $demande->getId(),
                'status' => $demande->getStatus(),
                'utilisateurid1' => $demande->getUtilisateurid1(),
            ],
        ];
    }

    $demandesEnvoyeesData = [];
    foreach ($demandesEnvoyees as $demande) {
        $destinataire = $demande->getDestinataire();
        $demandesEnvoyeesData[] = [
            'id' => $destinataire->getId(),
            'prenom' => $destinataire->getPrenom(),
            'nom' => $destinataire->getNom(),
            'age' => $destinataire->getAge(),
            'pdp' => $destinataire->getPdp(),
            'relation' => [
                'id' => $demande->getId(),
                'status' => $demande->getStatus(),
                'utilisateurid1' => $demande->getUtilisateurid1(),
            ],
        ];
    }

    $utilisateursData = [];
    foreach ($utilisateurs as $utilisateur) {
        $relation = $amisRepository->findDemande($currentUser->getId(), $utilisateur->getId());
        $utilisateursData[] = [
            'id' => $utilisateur->getId(),
            'prenom' => $utilisateur->getPrenom(),
            'nom' => $utilisateur->getNom(),
            'age' => $utilisateur->getAge(),
            'pdp' => $utilisateur->getPdp(),
            'relation' => $relation ? [
                'id' => $relation->getId(),
                'status' => $relation->getStatus(),
                'utilisateurid1' => $relation->getUtilisateurid1(),
            ] : null,
        ];
    }

    return new JsonResponse([
        'amis' => $amisData,
        'demandesRecues' => $demandesRecuesData,
        'demandesEnvoyees' => $demandesEnvoyeesData,
        'utilisateurs' => $utilisateursData,
        'sortBy' => $sortBy,
        'sortDirection' => $sortDirection,
        'filters' => $filters,
        'query' => $query,
        'currentUserId' => $currentUser->getId(),
    ]);
}
        // Rendu normal pour la page complète
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
            return $items;
        }

        $letter = strtoupper($letter);

        return array_filter($items, function($item) use ($letter) {
            if ($item instanceof Amis) {
                $demandeur = $item->getDemandeur();
                $destinataire = $item->getDestinataire();

                if ($demandeur instanceof Utilisateur) {
                    $prenomDemandeur = $demandeur->getPrenom() ?? '';
                    $nomDemandeur = $demandeur->getNom() ?? '';
                    if (strtoupper(substr($prenomDemandeur, 0, 1)) === $letter ||
                        strtoupper(substr($nomDemandeur, 0, 1)) === $letter) {
                        return true;
                    }
                }

                if ($destinataire instanceof Utilisateur) {
                    $prenomDestinataire = $destinataire->getPrenom() ?? '';
                    $nomDestinataire = $destinataire->getNom() ?? '';
                    if (strtoupper(substr($prenomDestinataire, 0, 1)) === $letter ||
                        strtoupper(substr($nomDestinataire, 0, 1)) === $letter) {
                        return true;
                    }
                }

                return false;
            } else if ($item instanceof Utilisateur) {
                $prenom = $item->getPrenom() ?? '';
                $nom = $item->getNom() ?? '';
                return strtoupper(substr($prenom, 0, 1)) === $letter ||
                       strtoupper(substr($nom, 0, 1)) === $letter;
            }

            return false;
        });
    }

    /**
     * Filtre une liste d'objets Amis ou Utilisateur selon un nom ou prénom
     */
    private function filterUsersByQuery(array $items, string $query): array
    {
        if (empty($query)) {
            return $items;
        }

        $query = strtolower(trim($query));

        return array_filter($items, function($item) use ($query) {
            if ($item instanceof Amis) {
                $demandeur = $item->getDemandeur();
                if ($demandeur instanceof Utilisateur) {
                    $prenomDemandeur = strtolower($demandeur->getPrenom() ?? '');
                    $nomDemandeur = strtolower($demandeur->getNom() ?? '');
                    if (strpos($prenomDemandeur, $query) !== false || strpos($nomDemandeur, $query) !== false) {
                        return true;
                    }
                }

                $destinataire = $item->getDestinataire();
                if ($destinataire instanceof Utilisateur) {
                    $prenomDestinataire = strtolower($destinataire->getPrenom() ?? '');
                    $nomDestinataire = strtolower($destinataire->getNom() ?? '');
                    if (strpos($prenomDestinataire, $query) !== false || strpos($nomDestinataire, $query) !== false) {
                        return true;
                    }
                }

                return false;
            } else if ($item instanceof Utilisateur) {
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

        $currentUser = $utilisateurRepository->find($userData['id']);
        if (!$currentUser) {
            throw $this->createNotFoundException('Utilisateur non trouvé');
        }

        $demandeExistante = $amisRepository->findDemande($currentUser->getId(), $destinataire->getId());

        if (!$demandeExistante) {
            $demande = new Amis();
            $demande->setDemandeur($currentUser);
            $demande->setDestinataire($destinataire);
            $demande->setDateAjout(new \DateTime());
            $demande->setStatus('attente');

            $entityManager->persist($demande);

            $message = $currentUser->getPrenom() . ' ' . $currentUser->getNom() . ' vous a envoyé une demande d\'ami';
            $notification = new Notification($message, $destinataire);
            $entityManager->persist($notification);

            $entityManager->flush();

            $this->addFlash('success', 'Invitation envoyée à ' . $destinataire->getPrenom() . ' ' . $destinataire->getNom());
        } else {
            $this->addFlash('info', 'Une demande existe déjà avec cet utilisateur');
        }

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

        $demandeur = $demande->getDemandeur();
        $message = $currentUser->getPrenom() . ' ' . $currentUser->getNom() . ' a accepté votre demande d\'ami';
        $notification = new Notification($message, $demandeur);
        $entityManager->persist($notification);

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

        if ($relation->getDemandeur()->getId() !== $currentUser->getId() && $relation->getDestinataire()->getId() !== $currentUser->getId()) {
            throw $this->createAccessDeniedException('Vous n\'avez pas l\'autorisation de supprimer cette relation');
        }

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

        $currentUser = $utilisateurRepository->find($userData['id']);
        if (!$currentUser) {
            throw $this->createNotFoundException('Utilisateur non trouvé');
        }

        $notifications = $notificationRepo->findBy([
            'utilisateur' => $currentUser->getId(),
        ], ['date_creation' => 'DESC']);

        $emetteurs = [];
        foreach ($notifications as $notification) {
            if (preg_match('/^([A-Za-z]+) ([A-Za-z]+) (vous a|a accepté)/', $notification->getMessage(), $matches)) {
                $prenom = $matches[1];
                $nom = $matches[2];

                $emetteur = $utilisateurRepository->findOneBy([
                    'prenom' => $prenom,
                    'nom' => $nom
                ]);

                if ($emetteur) {
                    $emetteurs[$notification->getId()] = $emetteur;
                }
            }
        }
        $user = $this->getUser();
        return $this->render('notifications.html.twig', [
            'user' => $user,
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
