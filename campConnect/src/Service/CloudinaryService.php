<?php

namespace App\Service;

use Cloudinary\Cloudinary;
use Cloudinary\Configuration\Configuration;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class CloudinaryService
{
    private Cloudinary $cloudinary;

    public function __construct()
    {
        // These will be set from environment variables
        $this->cloudinary = new Cloudinary(
            Configuration::instance([
                'cloud' => [
                    'cloud_name' => $_ENV['CLOUDINARY_CLOUD_NAME'] ?? '',
                    'api_key' => $_ENV['CLOUDINARY_API_KEY'] ?? '',
                    'api_secret' => $_ENV['CLOUDINARY_API_SECRET'] ?? '',
                ],
                'url' => [
                    'secure' => true
                ]
            ])
        );
    }

    public function uploadMedia(UploadedFile $file): ?array
    {
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

            return [
                'public_id' => $result['public_id'],
                'url' => $result['secure_url'],
                'type' => $fileType
            ];
        } catch (\Exception $e) {
            // Log error here
            return null;
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
        return 'raw';
    }
} 