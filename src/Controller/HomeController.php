<?php

namespace App\Controller;
use App\Repository\CampingRepository;
use App\Repository\ReservationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
   #[Route('/', name: 'app_home')]
    public function indexfront(CampingRepository $campingRepository): Response
    {
       $campings = $campingRepository->findAll();
    
        return $this->render('front/index.html.twig', [
            'campings' => $campings,
       ]);
    }

}
