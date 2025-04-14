<?php

namespace App\Controller;
use App\Repository\CampingRepository;
use App\Repository\ReservationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
  // #[Route('/', name: 'app_home')]
 //   public function index(CampingRepository $campingRepository): Response
  //  {
  //      $campings = $campingRepository->findAll();
        
 //       return $this->render('front/index.html.twig', [
 //           'campings' => $campings,
 //       ]);
 //   }
//}


    #[Route('/admin/reservations', name: 'admin_reservations_list')]
    public function index(ReservationRepository $reservationRepository): Response
    {
        $reservations = $reservationRepository->findAll();

        return $this->render('back/reservation/show.html.twig', [
            'reservations' => $reservations,
        ]);
    }
}
