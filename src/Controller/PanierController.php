<?php

namespace App\Controller;

use App\Entity\Equipement;
use App\Entity\Panier;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;

class PanierController extends AbstractController
{
    

    #[Route('/panier/ajouter', name: 'app_panier_ajouter', methods: ['POST'])]
    public function ajouterAuPanier(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
    
        if (!$data || !isset($data['equipement_id'], $data['quantite'], $data['prix_unitaire'])) {
            return $this->json(['error' => 'Données invalides'], 400);
        }
    
        // Récupération de l'équipement
        $equipement = $em->getRepository(Equipement::class)->find($data['equipement_id']);
    
        if (!$equipement) {
            return $this->json(['error' => 'Équipement non trouvé'], 404);
        }
    
        // Création du panier
        $panier = new Panier();
        $panier->setEquipement($equipement);
        $panier->setQuantite((int)$data['quantite']);
        $panier->setPrixTotal((float)$data['prix_unitaire'] * (int)$data['quantite']);
        $panier->setIdUtilisateur(1); // Par défaut
    
        $em->persist($panier);
        $em->flush();
    
        return $this->json([
            'success' => true,
            'message' => 'Équipement ajouté au panier avec succès.',
            'panier_id' => $panier->getId(),
        ]);
    }
    




}
