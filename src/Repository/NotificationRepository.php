<?php

namespace App\Repository;

use App\Entity\Notification;
use App\Entity\Utilisateur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class NotificationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Notification::class);
    }
    
    public function countUnreadByUser(Utilisateur $user): int
{
    return $this->createQueryBuilder('n')
        ->select('COUNT(n.id)')
        ->where('n.utilisateur = :user')
        ->andWhere('n.isRead = :isRead')
        ->setParameter('user', $user)
        ->setParameter('isRead', false)
        ->getQuery()
        ->getSingleScalarResult();
}
   
    // src/Repository/NotificationRepository.php
public function findByUser(Utilisateur $user)
{
    return $this->createQueryBuilder('n')
        ->where('n.utilisateur = :user')
        ->setParameter('user', $user)
        ->orderBy('n.dateCreation', 'DESC')
        ->getQuery()
        ->getResult();
}
}