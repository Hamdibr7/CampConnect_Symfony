<?php

namespace App\Service;


use Symfony\Contracts\HttpClient\HttpClientInterface;

class TranslateService
{
    private $client;
    private $apiKey;

    public function __construct(HttpClientInterface $client, string $apiKey)
    {
        $this->client = $client;
        $this->apiKey = $apiKey;
    }

    public function translate(string $text, string $targetLanguage): string
{
    try {
        $response = $this->client->request('POST', 'https://api-free.deepl.com/v2/translate', [
            'body' => [
                'auth_key' => $this->apiKey,
                'text' => $text,
                'target_lang' => strtoupper($targetLanguage),
            ],
        ]);

        $content = $response->toArray();
        return $content['translations'][0]['text'] ?? '';
    } catch (\Throwable $e) {
        // Log erreur ici si besoin
        return $text; // En cas d'erreur, retourne le texte original pour ne pas bloquer l'appli
    }
}

}
