<?php

namespace App\Controller;

use App\Entity\Reclamation;
use App\Entity\HistoriqueReclamation;
use App\Entity\Ticket;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/admin')]
#[IsGranted('ROLE_ADMIN')]
class BackOfficeController extends AbstractController
{
    #[Route('/reclamations', name: 'app_back_reclamations')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $reclamations = $entityManager->getRepository(Reclamation::class)->findAll();

        return $this->render('back_office/reclamations.html.twig', [
            'reclamations' => $reclamations
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
}
