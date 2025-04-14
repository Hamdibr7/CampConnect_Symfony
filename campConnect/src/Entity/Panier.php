<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use App\Entity\Equipement;

#[ORM\Entity]
class Panier
{

    #[ORM\Id]
    #[ORM\Column(type: "integer")]
    private int $id;

        #[ORM\ManyToOne(targetEntity: Utilisateur::class, inversedBy: "paniers")]
    #[ORM\JoinColumn(name: 'id_utilisateur', referencedColumnName: 'id', onDelete: 'CASCADE')]
    private Utilisateur $id_utilisateur;

        #[ORM\ManyToOne(targetEntity: Equipement::class, inversedBy: "paniers")]
    #[ORM\JoinColumn(name: 'id_Equip', referencedColumnName: 'id', onDelete: 'CASCADE')]
    private Equipement $id_Equip;

    #[ORM\Column(type: "integer")]
    private int $qte_com;

    #[ORM\Column(type: "float")]
    private float $prix_total;

    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function getId_utilisateur()
    {
        return $this->id_utilisateur;
    }

    public function setId_utilisateur($value)
    {
        $this->id_utilisateur = $value;
    }

    public function getId_Equip()
    {
        return $this->id_Equip;
    }

    public function setId_Equip($value)
    {
        $this->id_Equip = $value;
    }

    public function getQte_com()
    {
        return $this->qte_com;
    }

    public function setQte_com($value)
    {
        $this->qte_com = $value;
    }

    public function getPrix_total()
    {
        return $this->prix_total;
    }

    public function setPrix_total($value)
    {
        $this->prix_total = $value;
    }
}
