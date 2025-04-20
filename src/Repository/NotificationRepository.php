<?php

namespace App\Repository;

use App\Entity\Notification;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class NotificationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Notification::class);
    }

    public function findByUserId(int $userId): array
    {
        return $this->createQueryBuilder('n')
            ->leftJoin('n.initiateur', 'initiateur')
            ->addSelect('initiateur')
            ->where('n.utilisateur = :id')
            ->setParameter('id', $userId)
            ->orderBy('n.date_creation', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function countUnreadByUserId(int $userId): int
    {
        return $this->createQueryBuilder('n')
            ->select('COUNT(n.id)')
            ->where('n.utilisateur = :id')
            ->setParameter('id', $userId)
            ->getQuery()
            ->getSingleScalarResult();
    }
}
