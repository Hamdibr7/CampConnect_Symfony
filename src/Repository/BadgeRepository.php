<?php

namespace App\Repository;

use App\Entity\Badge;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
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
    
    public function searchFiltered(array $filters, PaginatorInterface $paginator, int $page = 1)
    {
        $qb = $this->createQueryBuilder('b');
    
        if (!empty($filters['nomBadge'])) {
            $qb->andWhere('b.nomBadge LIKE :nom')
               ->setParameter('nom', '%' . $filters['nomBadge'] . '%');
        }
    
        if (!empty($filters['reservationsRequises'])) {
            $qb->andWhere('b.reservationsRequises = :reservations')
               ->setParameter('reservations', $filters['reservationsRequises']);
        }
    
        if (!empty($filters['sort'])) {
            $qb->orderBy('b.reservationsRequises', $filters['sort']);
        }
    
        return $paginator->paginate(
            $qb,
            $page,
            10 // 10 badges par page
        );
    }
    
    
    
    
    
}
