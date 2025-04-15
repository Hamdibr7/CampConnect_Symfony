<?php

namespace App\Controller;

use App\Entity\Equipement;
use App\Entity\Panier;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;

use Dompdf\Dompdf;
use Dompdf\Options;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\PanierRepository;

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

    #[Route('/panier/pdf', name: 'generer_pdf')]
    public function genererPdf(PanierRepository $panierRepository): Response
    {
        // Données du panier utilisateur statique (id = 1)
        $paniers = $panierRepository->findBy(['id_utilisateur' => 1]);
    
         // Chemin absolu réel vers le logo
         $logoPath = realpath($this->getParameter('kernel.project_dir') . '/public/images/CampConnect_Logo.png');


    // Vérification (à supprimer après test)
    if (!$logoPath || !file_exists($logoPath)) {
        throw new \Exception('Logo non trouvé : ' . $logoPath);
    }
    // Options DomPDF
    $pdfOptions = new Options();
    $pdfOptions->set('defaultFont', 'Arial');
    $pdfOptions->setIsRemoteEnabled(true); // Important si vous utilisez des images

    $dompdf = new Dompdf($pdfOptions);
    
        // Rendu HTML depuis un template Twig
        $html = $this->renderView('Front/equipements/pdf.html.twig', [
            'paniers' => $paniers,
            'logo_path' => $logoPath, // 👈 Ajout de la variable manquante
        ]);
        
    
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
    
        // Téléchargement du PDF
        return new Response(
            $dompdf->stream("Ticket de caisse.pdf", ["Attachment" => true]),
            200,
            ['Content-Type' => 'application/pdf']
        );
    }
    
}    