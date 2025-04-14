<?php

namespace App\Controller;

use App\Entity\Publication;
use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UtilisateurRepository;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(EntityManagerInterface $entityManager, UtilisateurRepository $utilisateurRepository): Response
    {
        // Get default user (ID: 8)
        $defaultUser = $utilisateurRepository->find(8);
        
        if (!$defaultUser) {
            throw $this->createNotFoundException('Default user not found');
        }

        // Get all publications ordered by date
        $publications = $entityManager->getRepository(Publication::class)
            ->createQueryBuilder('p')
            ->orderBy('p.date', 'DESC')
            ->getQuery()
            ->getResult();

        // Get all users except the default user for the contacts list
        $users = $entityManager->getRepository(Utilisateur::class)
            ->createQueryBuilder('u')
            ->where('u.id != :defaultUserId')
            ->setParameter('defaultUserId', $defaultUser->getId())
            ->orderBy('u.nom', 'ASC')
            ->getQuery()
            ->getResult();

        return $this->render('home/index.html.twig', [
            'default_user' => $defaultUser,
            'posts' => $publications,
            'users' => $users
        ]);
    }
} 