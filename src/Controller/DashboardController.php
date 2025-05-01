<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    #[Route('/admin/dashboard', name: 'admin_dashboard')]
    public function index(EntityManagerInterface $em): Response
    {
        // Total revenue
        $totalRevenue = $em->createQuery('SELECT SUM(p.prix_total) FROM App\Entity\Panier p')
            ->getSingleScalarResult() ?? 0;

        // Total orders
        $totalOrders = $em->createQuery('SELECT COUNT(p.id) FROM App\Entity\Panier p')
            ->getSingleScalarResult() ?? 0;

        // Best seller
        $bestSeller = $em->createQuery('
            SELECT e.nomEquip AS nomEquip, SUM(p.qte_com) AS totalSold
            FROM App\Entity\Panier p
            JOIN p.equipement e
            GROUP BY e.id
            ORDER BY totalSold DESC
        ')
        ->setMaxResults(1)
        ->getOneOrNullResult();

        
      

        // Product stats for Chart.js
        $productStats = $em->createQuery('
            SELECT e.nomEquip AS nomEquip, SUM(p.qte_com) AS totalSold
            FROM App\Entity\Panier p
            JOIN p.equipement e
            GROUP BY e.id
        ')->getResult();

        $productLabels = array_column($productStats, 'nomEquip');
        $productSales = array_column($productStats, 'totalSold');

        return $this->render('dashboard/index.html.twig', [
            'totalRevenue' => $totalRevenue,
            'totalOrders' => $totalOrders,
            'bestSeller' => $bestSeller,
            'productLabels' => $productLabels,
            'productSales' => $productSales,
        ]);
    }
}
