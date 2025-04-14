<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use App\Entity\Camping;

#[ORM\Entity]
class Reservation
{

    #[ORM\Id]
    #[ORM\Column(type: "integer")]
    private int $id;

        #[ORM\ManyToOne(targetEntity: Utilisateur::class, inversedBy: "reservations")]
    #[ORM\JoinColumn(name: 'utilisateurid', referencedColumnName: 'id', onDelete: 'CASCADE')]
    private Utilisateur $utilisateurid;

        #[ORM\ManyToOne(targetEntity: Camping::class, inversedBy: "reservations")]
    #[ORM\JoinColumn(name: 'campingid', referencedColumnName: 'id', onDelete: 'CASCADE')]
    private Camping $campingid;

    #[ORM\Column(type: "float")]
    private float $montant;

    #[ORM\Column(type: "string", length: 255)]
    private string $statut;

    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function getUtilisateurid()
    {
        return $this->utilisateurid;
    }

    public function setUtilisateurid($value)
    {
        $this->utilisateurid = $value;
    }

    public function getCampingid()
    {
        return $this->campingid;
    }

    public function setCampingid($value)
    {
        $this->campingid = $value;
    }

    public function getMontant()
    {
        return $this->montant;
    }

    public function setMontant($value)
    {
        $this->montant = $value;
    }

    public function getStatut()
    {
        return $this->statut;
    }

    public function setStatut($value)
    {
        $this->statut = $value;
    }
}
