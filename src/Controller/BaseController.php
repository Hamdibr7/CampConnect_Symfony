<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\HistoriqueReclamation;
use Doctrine\ORM\EntityManagerInterface;

class BaseController extends AbstractController
{
    protected function addToHistory(EntityManagerInterface $entityManager, $reclamation, string $details): void
    {
        $historique = new HistoriqueReclamation();
        $historique->setReclamation($reclamation);
        $historique->setDetails($details);
        
        $entityManager->persist($historique);
        $entityManager->flush();
    }
}
