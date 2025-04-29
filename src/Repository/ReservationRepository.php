<?php

namespace App\Repository;

use App\Entity\Reservation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityRepository;

/**
 * @extends ServiceEntityRepository<Reservation>
 */
class ReservationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Reservation::class);
    }

//    /**
//     * @return Reservation[] Returns an array of Reservation objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Reservation
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
// src/Repository/ReservationRepository.php

public function searchFilteredQuery(array $filters)
{
    $qb = $this->createQueryBuilder('r')
               ->leftJoin('r.camping', 'c');

    if (!empty($filters['camping'])) {
        $qb->andWhere('c.nom LIKE :camping')
           ->setParameter('camping', '%' . $filters['camping'] . '%');
    }

    if (!empty($filters['ville'])) {
        $qb->andWhere('c.ville LIKE :ville')
           ->setParameter('ville', '%' . $filters['ville'] . '%');
    }

    if (!empty($filters['dateDebut'])) {
        $qb->andWhere('c.Date_Deb >= :dateDebut')
           ->setParameter('dateDebut', $filters['dateDebut']);
    }

    if (!empty($filters['montant'])) {
        $qb->andWhere('r.montant = :montant')
           ->setParameter('montant', $filters['montant']);
    }

    if (!empty($filters['utilisateurid'])) {
        $qb->andWhere('r.utilisateurid = :utilisateurid')
           ->setParameter('utilisateurid', $filters['utilisateurid']);
    }

    if (!empty($filters['sort'])) {
        $qb->orderBy('c.Date_Deb', $filters['sort'] === 'asc' ? 'ASC' : 'DESC');
    }

    return $qb->getQuery();
}


public function countCancellationsPerMonth(): array
{
    $conn = $this->getEntityManager()->getConnection();

    $sql = '
        SELECT 
            MONTH(deleted_at) AS month, 
            COUNT(id) AS cancelCount
        FROM reservation
        WHERE deleted_at IS NOT NULL
        GROUP BY MONTH(deleted_at)
        ORDER BY month ASC
    ';

    $stmt = $conn->prepare($sql);
    $result = $stmt->executeQuery();

    return $result->fetchAllAssociative();
}








}
