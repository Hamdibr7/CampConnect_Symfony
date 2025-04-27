<?php

namespace App\Repository;

use App\Entity\Reservation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

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

public function searchFiltered(array $filters): array
{
    $qb = $this->createQueryBuilder('r')
        ->join('r.camping', 'c');

    if (!empty($filters['camping'])) {
        $qb->andWhere('c.nom LIKE :camping')
           ->setParameter('camping', '%' . $filters['camping'] . '%');
    }

    if (!empty($filters['dateDebut'])) {
        $qb->andWhere('c.Date_Deb = :dateDebut')
           ->setParameter('dateDebut', new \DateTime($filters['dateDebut']));
    }

    if (!empty($filters['montant'])) {
        $qb->andWhere('r.montant = :montant')
           ->setParameter('montant', $filters['montant']);
    }

    if (!empty($filters['ville'])) {
        $qb->andWhere('c.ville LIKE :ville OR c.pays LIKE :ville')
           ->setParameter('ville', '%' . $filters['ville'] . '%');
    }

    return $qb->getQuery()->getResult();
}






}
