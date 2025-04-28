<?php

namespace App\Controller;

use App\Entity\Reclamation;
use App\Entity\HistoriqueReclamation;
use App\Entity\Ticket;
use App\Repository\ReclamationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Knp\Component\Pager\PaginatorInterface; // pagination

#[Route('/admin')]
#[IsGranted('ROLE_ADMIN')]
class BackOfficeController extends AbstractController
{
    #[Route('/reclamations', name: 'app_back_reclamations')]
    public function index(Request $request, EntityManagerInterface $entityManager, PaginatorInterface $paginator): Response
    {
        $query = $entityManager->getRepository(Reclamation::class)->createQueryBuilder('r')
            ->orderBy('r.id', 'DESC') // tu peux changer en ASC si tu veux
            ->getQuery();
    
        $reclamations = $paginator->paginate(
            $query, // Query ou QueryBuilder
            $request->query->getInt('page', 1), // page actuelle, 1 par défaut
            10 // Nombre d'éléments par page
        );
    
        return $this->render('back_office/reclamations.html.twig', [
            'reclamations' => $reclamations,
        ]);
    }

    #[Route('/reclamation/{id}', name: 'app_back_reclamation_view')]
    public function viewReclamation(Reclamation $reclamation, EntityManagerInterface $entityManager): Response
    {
        $historique = $entityManager->getRepository(HistoriqueReclamation::class)
            ->findByReclamation($reclamation);

        return $this->render('back_office/reclamation_view.html.twig', [
            'reclamation' => $reclamation,
            'historique' => $historique
        ]);
    }

    #[Route('/historique', name: 'app_back_historique')]
    public function historique(EntityManagerInterface $entityManager): Response
    {
        $historique = $entityManager->getRepository(HistoriqueReclamation::class)
            ->findAllOrdered();

        return $this->render('back_office/historique.html.twig', [
            'historique' => $historique
        ]);
    }

    #[Route('/ticket/{id}/status', name: 'app_back_ticket_status', methods: ['POST'])]
    public function updateTicketStatus(Request $request, Ticket $ticket, EntityManagerInterface $entityManager): Response
    {
        $status = $request->request->get('status');
        if (!in_array($status, ['En attente', 'En cours', 'Traité'])) {
            throw $this->createNotFoundException('Statut invalide.');
        }

        $ticket->setStatus($status);
        $reclamation = $ticket->getReclamation();
        $reclamation->setStatus($status);

        // Add to history
        $historique = new HistoriqueReclamation();
        $historique->setReclamation($reclamation);
        $historique->setDetails(sprintf(
            'Modification du statut de la réclamation ID %d à "%s"',
            $reclamation->getId(),
            $status
        ));
        
        $entityManager->persist($historique);
        $entityManager->flush();

        return $this->redirectToRoute('app_back_reclamation_view', ['id' => $reclamation->getId()]);
    }

    #[Route('/statistiques', name: 'app_back_statistiques')] // Changed from /back/statistiques to /statistiques
    public function statistiques(ReclamationRepository $reclamationRepository): Response
    {
        // Récupérer toutes les réclamations
        $reclamations = $reclamationRepository->findAll();

        // Réclamations par statut
        $reclamationsParStatus = [
            'En attente' => 0,
            'En cours' => 0,
            'Traité' => 0,
        ];
        foreach ($reclamations as $reclamation) {
            $status = $reclamation->getStatus();
            if (isset($reclamationsParStatus[$status])) {
                $reclamationsParStatus[$status]++;
            }
        }

        // Réclamations par camping
        $reclamationsParCamping = [];
        foreach ($reclamations as $reclamation) {
            $campingName = $reclamation->getCamping()->getNom();
            $reclamationsParCamping[$campingName] = ($reclamationsParCamping[$campingName] ?? 0) + 1;
        }

  // Réclamations par date
$reclamationsParDate = [];

foreach ($reclamations as $reclamation) {
    $dateObj = $reclamation->getDate();

    if ($dateObj !== null) { // ⚡ Vérification que la date existe
        $date = $dateObj->format('Y-m-d');
        $reclamationsParDate[$date] = ($reclamationsParDate[$date] ?? 0) + 1;
    }
}


        // Réclamations par utilisateur
        $reclamationsParUtilisateur = [];
        foreach ($reclamations as $reclamation) {
            $userEmail = $reclamation->getUtilisateur()->getEmail();
            $reclamationsParUtilisateur[$userEmail] = ($reclamationsParUtilisateur[$userEmail] ?? 0) + 1;
        }

        return $this->render('back_office/statistiques.html.twig', [
            'reclamationsParStatus' => $reclamationsParStatus,
            'reclamationsParCamping' => $reclamationsParCamping,
            'reclamationsParDate' => $reclamationsParDate,
            'reclamationsParUtilisateur' => $reclamationsParUtilisateur,
        ]);
    }
}