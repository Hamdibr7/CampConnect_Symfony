<?php

namespace App\Controller;

use App\Entity\Camping;
use App\Entity\Reservation;
use App\Form\ReservationType;
use App\Repository\ReservationRepository;
use App\Repository\CampingRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

#[Route('/reservation')]
class ReservationController extends AbstractController
{
    #[Route(path: '/', name: 'front_landing', methods: ['GET'])]
    public function index(CampingRepository $campingRepository): Response
    {
        $campings = $campingRepository->findAll();

        return $this->render('front/index.html.twig', [  'campings' => $campings,]);
    }

    
    #[Route('/list', name: 'reservation_index', methods: ['GET'])]
    public function list(Request $request, ReservationRepository $repo): Response
    {
        $filters = [
            'camping'   => $request->query->get('camping'),
            'dateDebut' => $request->query->get('dateDebut'),
            'montant'   => $request->query->get('montant'),
            'ville'     => $request->query->get('ville'),
            'sort'      => $request->query->get('sort'),
            
        ];
    
        $hasFilters = array_filter($filters); // remove empty/null values
    
        $reservations = $hasFilters
            ? $repo->searchFiltered($filters)
            : $repo->findAll();
    
        return $this->render('front/ListRes.html.twig', [
            'reservations' => $reservations,
            'filters'      => $filters,
        ]);
    }
    

    #[Route('/new/{camping_id}', name: 'reservation_new', methods: ['GET', 'POST'])]
    public function new(
        int $camping_id,
        CampingRepository $campingRepository,
        EntityManagerInterface $em,
        MailerInterface $mailer // ✅ Ajout Mailer
    ): Response {
        $camping = $campingRepository->find($camping_id);
    
        if (!$camping) {
            throw $this->createNotFoundException('Camping not found.');
        }
    
        $reservation = new Reservation();
        $reservation->setCamping($camping);
        $reservation->setUtilisateurid(2); // à remplacer par utilisateur connecté
        $reservation->setMontant($camping->getMontant());
    
        $em->persist($reservation);
        $em->flush();
    
        // ✅ Envoi d'email
        $email = (new Email())
            ->from('itscapconnect@gmail.com')
            ->to('yasmine.shili.04@gmail.com') // Remplacer par email réel
            ->subject('Confirmation de votre réservation')
            ->html("
                <p>Bonjour,</p>
                <p>Votre réservation pour le camping <strong>{$camping->getNom()}</strong> est confirmée.</p>
                <p>Montant : {$camping->getMontant()} DT</p>
                <p>Date de début : {$camping->getDate_Deb()->format('d/m/Y')}</p>
                <p>Merci pour votre confiance !</p>
            ");
    
        $mailer->send($email);
    
        // ✅ Envoi SMS via Twilio (optionnel)
        // require composer require twilio/sdk
      
        $sid = $_ENV['TWILIO_ACCOUNT_SID'];
        $token = $_ENV['TWILIO_ACCOUNT_TOKEN'];
        $twilio = new \Twilio\Rest\Client($sid, $token);
    
        $twilio->messages->create(
            '+21629704431', // Numéro de l'utilisateur
            [
                'from' => '+19787339026', // Numéro Twilio
                'body' => "Votre réservation pour le camping {$camping->getNom()} est confirmée. Merci !"
            ]
        );
        
    
        $this->addFlash('success', 'Réservation effectuée avec succès. Un email de confirmation vous a été envoyé.');
    
        return $this->redirectToRoute('reservation_index');
    }
    
    

    
    
    #[Route('/{id}/delete', name: 'reservation_delete', methods: ['POST'])]
    public function delete(Request $request, Reservation $reservation, EntityManagerInterface $em): Response
    {
        if (!$this->isCsrfTokenValid('delete ' . $reservation->getId(), $request->request->get('_token'))) {
            // Notice the space after 'delete'
            $this->addFlash('error', 'Invalid CSRF token.');
            return $this->redirectToRoute('reservation_index');
        }
    
        $campingStartDate = $reservation->getCamping()->getDate_Deb();
    
        if (new \DateTime() >= $campingStartDate) {
            $this->addFlash('error', 'You can no longer cancel this reservation. The camping has already started or starts today.');
            return $this->redirectToRoute('reservation_index');
        }
    
        $em->remove($reservation);
        $em->flush();
    
        $this->addFlash('success', 'Reservation canceled successfully.');
        return $this->redirectToRoute('reservation_index');
    }

    
    #[Route('/admin/reservation', name: 'admin_reservations_list')]
    public function RESBack(Request $request, ReservationRepository $repo): Response
    {
        // Get search filters from GET query
        $filters = [
            'camping'   => $request->query->get('camping'),
            'dateDebut' => $request->query->get('dateDebut'),
            'montant'   => $request->query->get('montant'),
            'ville'     => $request->query->get('ville'),
            'utilisateurid'    => $request->query->get('utilisateurid'),

            'sort'      => $request->query->get('sort'),
        ];
    
        $reservations = $repo->searchFiltered($filters);
    
        return $this->render('back/reservation/show.html.twig', [
            'reservations' => $reservations,
            'filters'      => $filters,
        ]);
    }
    
    
    
    
}
