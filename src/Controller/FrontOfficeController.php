<?php

namespace App\Controller;

use App\Entity\Reclamation;
use App\Entity\Ticket;
use App\Entity\HistoriqueReclamation;
use App\Form\ReclamationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Knp\Snappy\Pdf;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Service\TranslateService;


#[Route('/front')]
#[IsGranted('ROLE_USER')]
class FrontOfficeController extends AbstractController
{
    private function addToHistory(EntityManagerInterface $entityManager, Reclamation $reclamation, string $details): void
    {
        $historique = new HistoriqueReclamation();
        $historique->setReclamation($reclamation);
        $historique->setDetails($details);

        $entityManager->persist($historique);
        $entityManager->flush();
    }

    #[Route('/reclamations/{page}', name: 'app_front_reclamations', requirements: ['page' => '\d+'], defaults: ['page' => 1])]
    public function index(Request $request, EntityManagerInterface $entityManager, PaginatorInterface $paginator, int $page = 1): Response
    {
        $user = $this->getUser();
        $search = $request->query->get('search');
        $searchBy = $request->query->get('search_by');
        $order = $request->query->get('order', 'ASC');
    
        $qb = $entityManager->getRepository(Reclamation::class)->createQueryBuilder('r')
            ->where('r.utilisateur = :user')
            ->setParameter('user', $user);
    
        if ($search) {
            if ($searchBy) {
                switch ($searchBy) {
                    case 'status':
                        $qb->andWhere('r.status LIKE :search')
                           ->setParameter('search', '%' . $search . '%');
                        break;
                    case 'camping':
                        $qb->leftJoin('r.camping', 'c')
                           ->andWhere('c.nom LIKE :search')
                           ->setParameter('search', '%' . $search . '%');
                        break;
                    default:
                        $qb->andWhere('r.description LIKE :search')
                           ->setParameter('search', '%' . $search . '%');
                }
            } else {
                $qb->leftJoin('r.camping', 'c')
                   ->andWhere('r.description LIKE :search OR r.status LIKE :search OR c.nom LIKE :search')
                   ->setParameter('search', '%' . $search . '%');
            }
        }
    
        $qb->orderBy('r.id', $order);
    
        $reclamations = $paginator->paginate(
            $qb->getQuery(),
            $page, // utilise $page ici
            6
        );
    
        return $this->render('front_office/reclamations.html.twig', [
            'reclamations' => $reclamations,
        ]);
    }
    

    #[Route('/reclamation/new', name: 'app_front_reclamation_new', methods: ['GET', 'POST'])]
    public function newReclamation(Request $request, EntityManagerInterface $entityManager, MailerInterface $mailer, TranslateService $translateService): Response
    {
        $reclamation = new Reclamation();
        $reclamation->setUtilisateur($this->getUser());
    
        $form = $this->createForm(ReclamationType::class, $reclamation);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $reclamation->setStatus('En attente');
    
            $entityManager->persist($reclamation);
            $entityManager->flush();
    
            $ticket = new Ticket();
            $ticket->setDescription("Description de la réclamation : " . $reclamation->getDescription());
            $ticket->setReclamation($reclamation);
            $ticket->setUtilisateur($this->getUser());
            $ticket->setStatus('En attente');
    
            $entityManager->persist($ticket);
            $entityManager->flush();
    
            $this->addToHistory($entityManager, $reclamation,
                sprintf('Ajout de la réclamation ID %d, Description: %s',
                    $reclamation->getId(),
                    substr($reclamation->getDescription(), 0, 50) . '...'
                )
            );
    
            // Traduction
            $translatedDescription = $translateService->translate($reclamation->getDescription(), 'EN');
    
            // Mail
            $email = (new Email())
                ->from('hamdihamdisymfony@gmail.com')
                ->to('hamdibr123@gmail.com')
                ->subject('Nouvelle réclamation soumise')
                ->html('<p>Nouvelle réclamation de ' . htmlspecialchars($this->getUser()->getUserIdentifier()) . '.</p>
                        <p><strong>Original :</strong> ' . htmlspecialchars($reclamation->getDescription()) . '</p>
                        <p><strong>Anglais :</strong> ' . htmlspecialchars($translatedDescription) . '</p>');
    
            $mailer->send($email);
    
            $this->addFlash('success', 'Votre réclamation a été soumise avec succès.');
    
            return $this->redirectToRoute('app_front_reclamations', ['page' => 1]);
        }
    
        // ✅ Toujours rendre un formulaire si pas de POST valide
        return $this->render('front_office/reclamation_form.html.twig', [
            'form' => $form->createView(),
            'edit_mode' => false
        ]);
    }
    

    

    #[Route('/reclamation/{id}/edit', name: 'app_front_reclamation_edit', methods: ['GET', 'POST'])]
    public function editReclamation(Request $request, Reclamation $reclamation, EntityManagerInterface $entityManager): Response
    {
        if ($reclamation->getUtilisateur() !== $this->getUser()) {
            throw $this->createAccessDeniedException();
        }

        $form = $this->createForm(ReclamationType::class, $reclamation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ticket = $reclamation->getTickets()->first();
            if ($ticket) {
                $ticket->setDescription("Description de la réclamation : " . $reclamation->getDescription());
                $entityManager->flush();
            }

            $this->addToHistory($entityManager, $reclamation,
                sprintf('Modification de la réclamation ID %d, Nouvelle description: %s',
                    $reclamation->getId(),
                    substr($reclamation->getDescription(), 0, 50) . '...'
                )
            );

            $this->addFlash('success', 'Votre réclamation a été modifiée avec succès.');
            return $this->redirectToRoute('app_front_reclamation_view', ['id' => $reclamation->getId()]);
        }

        return $this->render('front_office/reclamation_form.html.twig', [
            'form' => $form->createView(),
            'edit_mode' => true,
            'reclamation' => $reclamation
        ]);
    }

    #[Route('/reclamation/{id}', name: 'app_front_reclamation_view')]
    public function viewReclamation(Reclamation $reclamation): Response
    {
        if ($reclamation->getUtilisateur() !== $this->getUser()) {
            throw $this->createAccessDeniedException();
        }

        return $this->render('front_office/tickets.html.twig', [
            'reclamation' => $reclamation
        ]);
    }

    #[Route('/reclamation/{id}/delete', name: 'app_front_reclamation_delete', methods: ['POST'])]
    public function deleteReclamation(Request $request, Reclamation $reclamation, EntityManagerInterface $entityManager): Response
    {
        if ($reclamation->getUtilisateur() !== $this->getUser()) {
            throw $this->createAccessDeniedException();
        }

        $this->addToHistory($entityManager, $reclamation,
            sprintf('Suppression de la réclamation ID %d, Description: %s',
                $reclamation->getId(),
                substr($reclamation->getDescription(), 0, 50) . '...'
            )
        );

        $entityManager->remove($reclamation);
        $entityManager->flush();

        $this->addFlash('success', 'La réclamation a été supprimée avec succès.');
        return $this->redirectToRoute('app_front_reclamations');
    }

    #[Route('/reclamation/{id}/pdf', name: 'app_front_reclamation_pdf')]
    public function generatePdf(Reclamation $reclamation, Pdf $knpSnappyPdf): Response
    {
        if ($reclamation->getUtilisateur() !== $this->getUser()) {
            throw $this->createAccessDeniedException();
        }

        $html = $this->renderView('front_office/pdf/reclamation.html.twig', [
            'reclamation' => $reclamation,
        ]);

        $filename = sprintf('reclamation_%d.pdf', $reclamation->getId());

        return new Response(
            $knpSnappyPdf->getOutputFromHtml($html),
            200,
            [
                'Content-Type'          => 'application/pdf',
                'Content-Disposition'   => ResponseHeaderBag::DISPOSITION_ATTACHMENT . '; filename="' . $filename . '"'
            ]
        );
    }
}
