<?php

namespace App\Service;

use App\Entity\Notification;
use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManagerInterface;

class NotificationService
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function createNotification(Utilisateur $utilisateur, string $message): Notification
    {
        $notification = new Notification($message, $utilisateur);
        $this->entityManager->persist($notification);
        $this->entityManager->flush();
        
        return $notification;
    }
    // src/Service/NotificationService.php
public function countUnreadNotifications(Utilisateur $user): int
{
    return $this->entityManager->getRepository(Notification::class)
        ->count(['utilisateur' => $user, 'estLue' => false]);
}

}