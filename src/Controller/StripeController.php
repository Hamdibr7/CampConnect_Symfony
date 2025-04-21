<?php

namespace App\Controller;

use App\Repository\PanierRepository;
use Stripe\Checkout\Session;
use Stripe\Stripe;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class StripeController extends AbstractController
{
    private ParameterBagInterface $params;

    public function __construct(ParameterBagInterface $params)
    {
        $this->params = $params;
    }

    #[Route('/paiement/create-session', name: 'stripe_create_session', methods: ['POST'])]
    public function createSession(Request $request, PanierRepository $panierRepository): Response
    {
        $panierId = $request->request->get('panierId');
        $panier = $panierRepository->find($panierId);

        if (!$panier) {
            $this->addFlash('danger', 'Commande introuvable.');
            return $this->redirectToRoute('mon_compte_commandes');
        }

        Stripe::setApiKey($this->params->get('stripe_secret_key'));

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => $panier->getEquipement()->getNomEquip(),
                    ],
                    'unit_amount' => intval($panier->getPrixTotal() * 100), // must be int
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => $this->generateUrl('stripe_success', [], UrlGeneratorInterface::ABSOLUTE_URL),
            'cancel_url' => $this->generateUrl('stripe_cancel', [], UrlGeneratorInterface::ABSOLUTE_URL),
        ]);

        return $this->redirect($session->url, 303);
    }

    #[Route('/paiement/success', name: 'stripe_success')]
    public function success(): Response
    {
        $this->addFlash('success', '✅ Paiement effectué avec succès.');
        return $this->redirectToRoute('user_orders');
    }

    #[Route('/paiement/cancel', name: 'stripe_cancel')]
    public function cancel(): Response
    {
        $this->addFlash('danger', '❌ Paiement annulé.');
        return $this->redirectToRoute('user_orders');
    }
}
