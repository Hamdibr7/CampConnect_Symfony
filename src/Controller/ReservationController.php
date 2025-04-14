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

#[Route('/reservation')]
class ReservationController extends AbstractController
{
    #[Route(path: '/', name: 'front_landing', methods: ['GET'])]
    public function index(CampingRepository $campingRepository): Response
    {
        $campings = $campingRepository->findAll();

        return $this->render('front/index.html.twig', [
            'campings' => $campings,
        ]);
    }

    #[Route('/list', name: 'reservation_index', methods: ['GET'])]
    public function list(ReservationRepository $reservationRepository): Response
    {
        $reservations = $reservationRepository->findAll();

        return $this->render('/front/ListRes.html.twig', [
            'reservations' => $reservations,
        ]);
    }

    #[Route('/new/{camping_id}', name: 'reservation_new', methods: ['GET', 'POST'])]
    public function new(int $camping_id, CampingRepository $campingRepository, EntityManagerInterface $em): Response
    {
        $camping = $campingRepository->find($camping_id);
    
        if (!$camping) {
            throw $this->createNotFoundException('Camping not found.');
        }
    
        $reservation = new Reservation();
        $reservation->setCamping($camping);
        $reservation->setUtilisateurid(2);
        $reservation->setMontant($camping->getMontant());

        $em->persist($reservation);
        $em->flush();
    
        $this->addFlash('success', 'Reservation created successfully!');
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
    
}
