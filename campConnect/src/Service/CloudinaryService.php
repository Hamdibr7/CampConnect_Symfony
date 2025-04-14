<?php

namespace App\Service;

use Cloudinary\Cloudinary;
use Cloudinary\Configuration\Configuration;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class CloudinaryService
{
    private Cloudinary $cloudinary;

    public function __construct(ParameterBagInterface $params)
    {
        // Validate Cloudinary credentials
        $cloudName = $params->get('cloudinary.cloud_name');
        $apiKey = $params->get('cloudinary.api_key');
        $apiSecret = $params->get('cloudinary.api_secret');

        if (empty($cloudName) || empty($apiKey) || empty($apiSecret)) {
            throw new \RuntimeException('Cloudinary credentials are not properly configured');
        }

        $this->cloudinary = new Cloudinary(
            Configuration::instance([
                'cloud' => [
                    'cloud_name' => $cloudName,
                    'api_key' => $apiKey,
                    'api_secret' => $apiSecret,
                ],
                'url' => [
                    'secure' => true
                ]
            ])
        );
    }

    public function uploadMedia(UploadedFile $file): ?array
    {
        if (!$file->isValid()) {
            throw new \RuntimeException('Invalid file upload');
        }

        try {
            $fileType = $this->getFileType($file->getMimeType());
            $options = [
                'resource_type' => $fileType,
                'folder' => 'campconnect'
            ];

            if ($fileType === 'video') {
                $options['chunk_size'] = 6000000; // 6MB chunks for videos
            }

            $result = $this->cloudinary->uploadApi()->upload(
                $file->getRealPath(),
                $options
            );

            if (!isset($result['secure_url'])) {
                throw new \RuntimeException('Cloudinary upload succeeded but no URL was returned');
            }

            return [
                'public_id' => $result['public_id'],
                'url' => $result['secure_url'],
                'type' => $fileType
            ];
        } catch (\Exception $e) {
            throw new \RuntimeException('Cloudinary upload failed: ' . $e->getMessage(), 0, $e);
        }
    }

    private function getFileType(string $mimeType): string
    {
        if (strpos($mimeType, 'image/') === 0) {
            return 'image';
        }
        if (strpos($mimeType, 'video/') === 0) {
            return 'video';
        }
        throw new \RuntimeException('Unsupported file type: ' . $mimeType);
    }
} 