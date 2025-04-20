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
    public function markAsRead(Notification $notification): void
    {
        $notification->setIsRead(true);
        $this->entityManager->flush();
    }
    public function createFriendRequestNotification(Utilisateur $destinataire, Utilisateur $demandeur): Notification
    {
        $message = $demandeur->getPrenom() . ' ' . $demandeur->getNom() . ' vous a envoyé une demande d\'ami';
        return $this->createNotification($destinataire, $message);
    }
    public function createFriendAcceptedNotification(Utilisateur $destinataire, Utilisateur $accepteur): Notification
    {
        $message = $accepteur->getPrenom() . ' ' . $accepteur->getNom() . ' a accepté votre demande d\'ami';
        return $this->createNotification($destinataire, $message);
    }
 
}