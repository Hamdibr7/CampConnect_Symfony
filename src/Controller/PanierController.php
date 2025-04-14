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

        // Vérification de la quantité disponible
        $quantiteDisponible = $equipement->getQuantite(); // Récupère la quantité disponible
        $quantiteDemandee = (int)$data['quantite'];

        if ($quantiteDemandee > $quantiteDisponible) {
            if ($quantiteDisponible == 0) {
                return $this->json(['error' => 'Rupture de stock, l\'équipement est épuisé.'], 400); // Alerte stock épuisé
            } else {
                return $this->json(['error' => 'La quantité demandée dépasse la quantité disponible.'], 400); // Alerte dépassement
            }
        }

        // Mise à jour de la quantité de l'équipement dans le stock
        $equipement->setQuantite($quantiteDisponible - $quantiteDemandee);
        $em->flush();

        // Vérification si l'équipement est déjà dans le panier de l'utilisateur
        $panier = $em->getRepository(Panier::class)
            ->findOneBy(['equipement' => $equipement, 'idUtilisateur' => 1]); // Par défaut, idUtilisateur = 1
    
        if ($panier) {
            // Si l'équipement existe déjà dans le panier, on met à jour la quantité et le prix total
            $panier->setQuantite($panier->getQuantite() + $quantiteDemandee);
            $panier->setPrixTotal($panier->getQuantite() * (float)$data['prix_unitaire']);
            $em->flush();
    
            return $this->json([
                'success' => true,
                'message' => 'Quantité mise à jour dans le panier.',
                'panier_id' => $panier->getId(),
            ]);
        }
    
        // Sinon, on crée un nouvel élément dans le panier
        $panier = new Panier();
        $panier->setEquipement($equipement);
        $panier->setQuantite($quantiteDemandee);
        $panier->setPrixTotal((float)$data['prix_unitaire'] * $quantiteDemandee);
        $panier->setIdUtilisateur(1); // Par défaut
    
        $em->persist($panier);
        $em->flush();
    
        return $this->json([
            'success' => true,
            'message' => 'Équipement ajouté au panier avec succès.',
            'panier_id' => $panier->getId(),
        ]);
    }

    
    #[Route('/panier/supprimer', name: 'app_panier_supprimer', methods: ['POST'])]
    public function supprimerDuPanier(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        if (!$data || !isset($data['panier_id'])) {
            return $this->json(['error' => 'Données invalides'], 400);
        }

        $panier = $em->getRepository(Panier::class)->find($data['panier_id']);
        
        if (!$panier) {
            return $this->json(['error' => 'Panier non trouvé'], 404);
        }

        $em->remove($panier);
        $em->flush();

        return $this->json([
            'success' => true,
            'message' => 'Équipement supprimé du panier avec succès.'
        ]);
    }
    




}
