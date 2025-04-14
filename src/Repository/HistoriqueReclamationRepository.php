<?php

namespace App\Repository;

use App\Entity\HistoriqueReclamation;
use App\Entity\Reclamation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<HistoriqueReclamation>
 *
 * @method HistoriqueReclamation|null find($id, $lockMode = null, $lockVersion = null)
 * @method HistoriqueReclamation|null findOneBy(array $criteria, array $orderBy = null)
 * @method HistoriqueReclamation[]    findAll()
 * @method HistoriqueReclamation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HistoriqueReclamationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HistoriqueReclamation::class);
    }

    /**
     * Find history entries for a specific reclamation
     */
    public function findByReclamation(Reclamation $reclamation): array
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.reclamation = :reclamation')
            ->setParameter('reclamation', $reclamation)
            ->orderBy('h.date', 'DESC')
            ->addOrderBy('h.heure', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Find all history entries ordered by date and time
     */
    public function findAllOrdered(): array
    {
        $results = $this->createQueryBuilder('h')
            ->leftJoin('h.reclamation', 'r')
            ->orderBy('h.date', 'DESC')
            ->addOrderBy('h.heure', 'DESC')
            ->getQuery()
            ->getResult();
    
        return array_map(function (HistoriqueReclamation $entry) {
            return [
                'date' => $entry->getDate()?->format('Y-m-d'),
                'heure' => $entry->getHeure()?->format('H:i:s'),
                'details' => $entry->getDetails(),
                'reclamationId' => $entry->getReclamation()?->getId(),
                'reclamation' => $entry->getReclamation(),
            ];
        }, $results);
    }
    
}
