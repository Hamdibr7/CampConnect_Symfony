<?php

namespace App\Repository;

use App\Entity\Utilisateur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Utilisateur>
 */
class UtilisateurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Utilisateur::class);
    }
    public function findAllExceptCurrent(int $currentUserId): array
    {
        return $this->createQueryBuilder('u')
            ->where('u.id != :id')
            ->setParameter('id', $currentUserId)
            ->getQuery()
            ->getResult();
    }
    public function findUtilisateursForAmis(int $currentUserId, ?string $query, array $filters, ?string $letter, ?string $sortBy, ?string $sortDirection): array
    {
        $qb = $this->createQueryBuilder('u')
            ->where('u.id != :currentUserId')
            ->setParameter('currentUserId', $currentUserId);

        // Recherche par nom/prénom
        if ($query) {
            $qb->andWhere('u.prenom LIKE :query OR u.nom LIKE :query')
               ->setParameter('query', '%' . $query . '%');
        }

        // Filtre par première lettre
        if ($letter) {
            $qb->andWhere('u.prenom LIKE :letter')
               ->setParameter('letter', $letter . '%');
        }

        // Appliquer le tri
        if ($sortBy && $sortDirection) {
            switch ($sortBy) {
                case 'name':
                    $qb->orderBy('u.prenom', $sortDirection)
                       ->addOrderBy('u.nom', $sortDirection);
                    break;
                case 'age':
                    $qb->orderBy('u.age', $sortDirection);
                    break;
                default:
                    $qb->orderBy('u.prenom', 'ASC');
            }
        } else {
            $qb->orderBy('u.prenom', 'ASC');
        }

        return $qb->getQuery()->getResult();
    }
    
    //    /**
    //     * @return Utilisateur[] Returns an array of Utilisateur objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('u')
    //            ->andWhere('u.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('u.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Utilisateur
    //    {
    //        return $this->createQueryBuilder('u')
    //            ->andWhere('u.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
