<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TranslateController extends AbstractController
{
    #[Route('/api/translate', name: 'api_translate', methods: ['POST'])]
    public function translate(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $text = $data['text'] ?? '';
        $targetLanguage = $data['target_language'] ?? 'en';

        if (!$text) {
            return new JsonResponse(['error' => 'Text is required'], 400);
        }

        // Ici tu appelles un service de traduction
        $translatedText = '...'; // traduction réelle ici

        return new JsonResponse([
            'translated_text' => $translatedText
        ]);
    }
}
