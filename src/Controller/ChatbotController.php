<?php

namespace App\Controller;

use OpenAI;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class ChatbotController extends AbstractController
{
    private ParameterBagInterface $params;

    public function __construct(ParameterBagInterface $params)
    {
        $this->params = $params;
    }

    #[Route('/chatbot', name: 'app_chatbot')]
    public function index(): Response
    {
        return $this->render('chatbot.html.twig');
    }

    #[Route('/api/chat', name: 'app_chat_api', methods: ['POST'])]
    public function chatApi(Request $request): JsonResponse
    {
        $message = $request->request->get('message');
        
        if (empty($message)) {
            return $this->json(['error' => 'Le message ne peut pas être vide'], 400);
        }

        // Récupération de la clé API depuis les paramètres
        $apiKey = $this->params->get('OPENAI_API_KEY');

        if (empty($apiKey)) {
            return $this->json(['error' => 'Clé API non configurée'], 500);
        }

        try {
            // Initialisation du client OpenAI
            $client = OpenAI::client($apiKey);

            // Envoi de la requête à OpenAI
            $response = $client->chat()->create([
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    ['role' => 'system', 'content' => 'Tu es un assistant spécialisé dans les réclamations de camping. Réponds de manière concise et utile.'],
                    ['role' => 'user', 'content' => $message],
                ],
                'temperature' => 0.7,
                'max_tokens' => 500,
            ]);

            return $this->json([
                'response' => $response->choices[0]->message->content
            ]);
        } catch (\Exception $e) {
            return $this->json([
                'error' => 'Une erreur est survenue avec le service de chat',
                'details' => $e->getMessage()
            ], 500);
        }
    }
}
