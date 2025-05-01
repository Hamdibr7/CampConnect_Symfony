<?php

namespace App\Controller;
use App\Entity\Historique;
use App\Entity\Equipement;
use App\Entity\Panier;
use App\Repository\PanierRepository;
use Doctrine\ORM\EntityManagerInterface;
use Dompdf\Dompdf;
use Dompdf\Options;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PanierController extends AbstractController
{
    #[Route('/panier/ajouter', name: 'app_panier_ajouter', methods: ['POST'])]
    public function ajouterAuPanier(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        if (!$data || !isset($data['equipement_id'], $data['quantite'], $data['prix_unitaire'])) {
            return $this->json(['error' => 'Données invalides'], 400);
        }

        $equipement = $em->getRepository(Equipement::class)->find($data['equipement_id']);

        if (!$equipement) {
            return $this->json(['error' => 'Équipement non trouvé'], 404);
        }

        $panier = new Panier();
        $panier->setEquipement($equipement);
        $panier->setQuantite((int)$data['quantite']);
        $panier->setPrixTotal((float)$data['prix_unitaire'] * (int)$data['quantite']);
        $panier->setIdUtilisateur(1); // à remplacer par utilisateur connecté

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
        $paniers = $panierRepository->findBy(['id_utilisateur' => 1]);
    
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');
        $pdfOptions->setIsRemoteEnabled(true); // Nécessaire pour charger des ressources distantes
        $pdfOptions->setIsHtml5ParserEnabled(true);
        $pdfOptions->setIsPhpEnabled(true);
    
        $dompdf = new Dompdf($pdfOptions);
    
        // URL HTTP pour accéder à l'image via le serveur local
        $logoForPdf = 'http://localhost/images/CampConnect_Logo.png';
    
        $html = $this->renderView('panier/pdf_all.html.twig', [
            'paniers' => $paniers,
            'logo_path' => $logoForPdf,
        ]);
    
        // Débogage : Affichez le HTML rendu pour vérifier (optionnel)
        // return new Response($html);
    
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
    
        return new Response(
            $dompdf->stream("Rapport de panier.pdf", ["Attachment" => true]),
            200,
            ['Content-Type' => 'application/pdf']
        );
    }



    #[Route('/admin/paniers', name: 'admin_panier_index')]
    public function listePaniers(Request $request, PanierRepository $panierRepository): Response
    {
    $minPrix = $request->query->get('min_prix');
    $maxPrix = $request->query->get('max_prix');

    $queryBuilder = $panierRepository->createQueryBuilder('p');

    if ($minPrix !== null && $minPrix !== '') {
        $queryBuilder->andWhere('p.prix_total >= :minPrix')
                     ->setParameter('minPrix', (float)$minPrix);
    }

    if ($maxPrix !== null && $maxPrix !== '') {
        $queryBuilder->andWhere('p.prix_total <= :maxPrix')
                     ->setParameter('maxPrix', (float)$maxPrix);
    }

    $paniers = $queryBuilder->getQuery()->getResult();

    return $this->render('panier/index.html.twig', [
        'paniers' => $paniers,
    ]);
}



#[Route('/panier/valider', name: 'valider_commande', methods: ['POST'])]
    public function validerCommande(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $cartData = json_decode($request->getContent(), true);

        if (!$cartData || !is_array($cartData)) {
            return $this->json(['error' => 'Données de panier invalides'], 400);
        }

        try {
            $produitsEpuises = [];

            foreach ($cartData as $item) {
                if (!isset($item['id'], $item['quantity'], $item['price'])) {
                    continue;
                }

                $equipement = $em->getRepository(Equipement::class)->find($item['id']);
                if (!$equipement) continue;

                $quantiteDemandee = (int) $item['quantity'];

                if ($equipement->getQteDispo() < $quantiteDemandee) {
                    return $this->json([
                        'error' => 'Stock insuffisant pour l\'équipement : ' . $equipement->getNomEquip(),
                        'id' => $equipement->getId()
                    ], 400);
                }

                $equipement->setQteDispo($equipement->getQteDispo() - $quantiteDemandee);

                if ($equipement->getQteDispo() == 0) {
                    $produitsEpuises[] = $equipement->getNomEquip();
                }

                $panier = new Panier();
                $panier->setEquipement($equipement);
                $panier->setQuantite($quantiteDemandee);
                $panier->setPrixTotal((float)$item['price'] * $quantiteDemandee);
                $panier->setIdUtilisateur(1);

                $em->persist($panier);
            }

            $em->flush();

            if (!empty($produitsEpuises)) {
                $this->addFlash('danger', 'Produits en rupture de stock : ' . implode(', ', $produitsEpuises));
            }

            return $this->json(['success' => true, 'message' => 'Commande enregistrée avec décrémentation du stock.']);
        } catch (\Exception $e) {
            return $this->json(['error' => 'Erreur : ' . $e->getMessage()], 500);
        }
    }


   
#[Route('/mon-compte/commandes', name: 'user_orders')]
    public function mesCommandes(PanierRepository $panierRepository, Request $request, EntityManagerInterface $em): Response
    {
        // Vérifie si un panier a été payé avec succès et doit être supprimé
        $session = $request->getSession();
        if ($session->get('success_panier_id')) {
            $panierId = $session->get('success_panier_id');
            $panier = $panierRepository->find($panierId);
            if ($panier) {
                $em->remove($panier);
                $em->flush();
            }
            $session->remove('success_panier_id');
            $this->addFlash('success', '✅ Paiement confirmé et commande supprimée du panier.');
        }

        $paniers = $panierRepository->findBy(['id_utilisateur' => 1]);

        return $this->render('panier/liste.html.twig', [
            'paniers' => $paniers,
        ]);
    }
    
    
    
    /*#[Route('/mon-compte/historique', name: 'user_historique')]
    public function historique(EntityManagerInterface $em): Response
    {
        $historiques = $em->getRepository(Historique::class)->findBy(['utilisateur' => 1]); // Replace 1 with actual user ID

    return $this->render('historique/index.html.twig', [
        'historiques' => $historiques,
    ]);
    }*/


    /*#[Route('/admin/paniers/pdf', name: 'admin_panier_pdf')]
public function exportPdfAllPaniers(PanierRepository $panierRepository): Response
{
    $paniers = $panierRepository->findAll();
    $logoPath = realpath($this->getParameter('kernel.project_dir') . '/public/images/CampConnect_Logo.png');

    if (!$logoPath || !file_exists($logoPath)) {
        throw new \Exception('Logo non trouvé : ' . $logoPath);
    }

    $pdfOptions = new Options();
    $pdfOptions->set('defaultFont', 'Arial');
    $pdfOptions->setIsRemoteEnabled(true);

    $dompdf = new Dompdf($pdfOptions);

    $html = $this->renderView('BackOffice/panier/pdf_all.html.twig', [
        'paniers' => $paniers,
        'logo_path' => $logoPath,
        'date' => (new \DateTime())->format('d/m/Y H:i'),
    ]);

    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();

    return new Response(
        $dompdf->stream("Rapport_Paniers_Admin.pdf", ["Attachment" => true]),
        200,
        ['Content-Type' => 'application/pdf']
    );
}*/


}
