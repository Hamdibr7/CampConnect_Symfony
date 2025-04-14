<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use App\Entity\Camping;

#[ORM\Entity]
class Avis
{

    #[ORM\Id]
    #[ORM\Column(type: "integer")]
    private int $id;

        #[ORM\ManyToOne(targetEntity: Utilisateur::class, inversedBy: "aviss")]
    #[ORM\JoinColumn(name: 'utilisateurid', referencedColumnName: 'id', onDelete: 'CASCADE')]
    private Utilisateur $utilisateurid;

        #[ORM\ManyToOne(targetEntity: Camping::class, inversedBy: "aviss")]
    #[ORM\JoinColumn(name: 'campingid', referencedColumnName: 'id', onDelete: 'CASCADE')]
    private Camping $campingid;

    #[ORM\Column(type: "integer")]
    private int $evaluation;

    #[ORM\Column(type: "text")]
    private string $avis;

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

    public function getEvaluation()
    {
        return $this->evaluation;
    }

    public function setEvaluation($value)
    {
        $this->evaluation = $value;
    }

    public function getAvis()
    {
        return $this->avis;
    }

    public function setAvis($value)
    {
        $this->avis = $value;
    }
}
