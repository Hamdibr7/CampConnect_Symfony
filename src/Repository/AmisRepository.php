<?php

namespace App\Repository;

use App\Entity\Amis;
use App\Entity\Utilisateur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class AmisRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Amis::class);
    }
    public function findDemandesEnvoyees(int $utilisateurId)
    {
        return $this->createQueryBuilder('a')
            ->leftJoin('a.demandeur', 'demandeur')
            ->leftJoin('a.destinataire', 'destinataire')
            ->addSelect('demandeur', 'destinataire')
            ->where('a.utilisateurid1 = :utilisateurId')
            ->andWhere('a.status = :status')
            ->setParameter('utilisateurId', $utilisateurId)
            ->setParameter('status', 'attente')
            ->getQuery()
            ->getResult();
    }
    
    public function findDemandesRecues(int $utilisateurId)
    {
        return $this->createQueryBuilder('a')
            ->leftJoin('a.demandeur', 'demandeur')
            ->leftJoin('a.destinataire', 'destinataire')
            ->addSelect('demandeur', 'destinataire')
            ->where('a.utilisateurid2 = :utilisateurId')
            ->andWhere('a.status = :status')
            ->setParameter('utilisateurId', $utilisateurId)
            ->setParameter('status', 'attente')
            ->getQuery()
            ->getResult();
    }
    public function findAmis(int $utilisateurId)
    {
        return $this->createQueryBuilder('a')
            ->where('(a.utilisateurid1 = :utilisateurId OR a.utilisateurid2 = :utilisateurId)')
            ->andWhere('a.status = :status')
            ->setParameter('utilisateurId', $utilisateurId)
            ->setParameter('status', 'amis')
            ->getQuery()
            ->getResult();
    }
    
    public function findDemande(int $utilisateurId1, int $utilisateurId2)
    {
        return $this->createQueryBuilder('a')
            ->where('(a.utilisateurid1 = :utilisateurId1 AND a.utilisateurid2 = :utilisateurId2) OR (a.utilisateurid1 = :utilisateurId2 AND a.utilisateurid2 = :utilisateurId1)')
            ->setParameter('utilisateurId1', $utilisateurId1)
            ->setParameter('utilisateurId2', $utilisateurId2)
            ->getQuery()
            ->getOneOrNullResult();
    }
    
    // Méthode améliorée pour récupérer les amis avec les informations des utilisateurs
    public function findAmisWithDetails(int $utilisateurId)
    {
        return $this->createQueryBuilder('a')
            ->leftJoin('a.demandeur', 'demandeur')
            ->leftJoin('a.destinataire', 'destinataire')
            ->addSelect('demandeur', 'destinataire')
            ->where('(a.utilisateurid1 = :utilisateurId OR a.utilisateurid2 = :utilisateurId)')
            ->andWhere('a.status = :status')
            ->setParameter('utilisateurId', $utilisateurId)
            ->setParameter('status', 'amis')
            ->getQuery()
            ->getResult();
    }
}