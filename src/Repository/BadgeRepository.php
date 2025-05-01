<?php

namespace App\Repository;

use App\Entity\Badge;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\QueryBuilder;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @extends ServiceEntityRepository<Badge>
 */
class BadgeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Badge::class);
    }

    //    /**
    //     * @return Badge[] Returns an array of Badge objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('b')
    //            ->andWhere('b.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('b.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Badge
    //    {
    //        return $this->createQueryBuilder('b')
    //            ->andWhere('b.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
    
    

public function searchFilteredQuery(array $filters): QueryBuilder

    {
        $qb = $this->createQueryBuilder('b');

        if (!empty($filters['nomBadge'])) {
            $qb->andWhere('b.nom_badge LIKE :nom_badge')
               ->setParameter('nom_badge', '%' . $filters['nomBadge'] . '%');
        }

        if (!empty($filters['reservationsRequises'])) {
            $qb->andWhere('b.reservations_requises = :reservations')
               ->setParameter('reservations', $filters['reservationsRequises']);
        }

        $allowedFields = ['reservations_requises', 'nom_badge', 'id'];
        if (!empty($filters['orderBy']) && in_array($filters['orderBy'], $allowedFields)) {
            $direction = strtoupper($filters['sort'] ?? 'ASC');
            $qb->orderBy('b.' . $filters['orderBy'], $direction);
        } else {
            $qb->orderBy('b.id', 'ASC');
        }

        return $qb;
    }
    
    
    
    
    
    
    
    
    
}
