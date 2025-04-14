<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity]
class Historique
{

    #[ORM\Id]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\Column(type: "integer")]
    private int $id_equip;

    #[ORM\Column(type: "integer")]
    private int $qte_com;

    #[ORM\Column(type: "integer")]
    private int $id_utilisateur;

    #[ORM\Column(type: "float")]
    private float $prix_total;

    #[ORM\Column(type: "datetime")]
    private \DateTimeInterface $date_achat;

    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function getId_equip()
    {
        return $this->id_equip;
    }

    public function setId_equip($value)
    {
        $this->id_equip = $value;
    }

    public function getQte_com()
    {
        return $this->qte_com;
    }

    public function setQte_com($value)
    {
        $this->qte_com = $value;
    }

    public function getId_utilisateur()
    {
        return $this->id_utilisateur;
    }

    public function setId_utilisateur($value)
    {
        $this->id_utilisateur = $value;
    }

    public function getPrix_total()
    {
        return $this->prix_total;
    }

    public function setPrix_total($value)
    {
        $this->prix_total = $value;
    }

    public function getDate_achat()
    {
        return $this->date_achat;
    }

    public function setDate_achat($value)
    {
        $this->date_achat = $value;
    }
}
