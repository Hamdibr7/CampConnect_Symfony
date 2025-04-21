<?php

namespace App\Entity;

use App\Repository\PanierRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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

    #[ORM\Column(type: 'integer', nullable: false)] // Made sure it is not nullable here
    #[Assert\NotBlank(message: "La quantité est obligatoire")]
    #[Assert\Positive(message: "La quantité doit être positive")]
    private int $qte_com;

    #[ORM\Column(type: 'float', nullable: false)] // Made sure it is not nullable here
    #[Assert\NotBlank(message: "Le prix total est obligatoire")]
    #[Assert\Positive(message: "Le prix total doit être positif")]
    private float $prix_total;

    #[ORM\Column(type: 'integer', nullable: true)] // Made nullable
    private ?int $id_utilisateur = null; // Made nullable

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
        $this->qte_com = $quantite;
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

    public function getIdUtilisateur(): ?int
    {
        return $this->id_utilisateur;
    }

    public function setIdUtilisateur(?int $id_utilisateur): self
    {
        $this->id_utilisateur = $id_utilisateur;
        return $this;
    }
}
