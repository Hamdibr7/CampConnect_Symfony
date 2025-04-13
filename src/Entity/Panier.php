<?php

namespace App\Entity;

use App\Repository\PanierRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PanierRepository::class)]
class Panier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Equipement::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Equipement $equipement = null;

    #[ORM\Column(type: 'integer')]
    private int $qte_com;

    #[ORM\Column(type: 'float')]
    private float $prix_total;

    #[ORM\Column(type: 'integer')]
    private int $id_utilisateur;

    // Getters and setters

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEquipement(): ?Equipement
    {
        return $this->equipement;
    }

    public function setEquipement(?Equipement $equipement): self
    {
        $this->equipement = $equipement;
        return $this;
    }

    public function getQuantite(): int
    {
        return $this->qte_com;
    }

    public function setQuantite(int $quantite): self
    {
        $this->qte_com = $quantite; // Correction ici pour garder la cohérence
        return $this;
    }

    public function getPrixTotal(): float
    {
        return $this->prix_total;
    }

    public function setPrixTotal(float $prix_total): self
    {
        $this->prix_total = $prix_total;
        return $this;
    }

    public function getIdUtilisateur(): int // Correction ici du nom de la méthode
    {
        return $this->id_utilisateur;
    }

    public function setIdUtilisateur(int $id_utilisateur): self
    {
        $this->id_utilisateur = $id_utilisateur;
        return $this;
    }
}
