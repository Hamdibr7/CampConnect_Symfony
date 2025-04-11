<?php

namespace App\Entity;

use App\Repository\AmisRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AmisRepository::class)]
class Amis
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $utilisateurid1 = null;

    #[ORM\Column]
    private ?int $utilisateurid2 = null;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class)]
    #[ORM\JoinColumn(name: "utilisateurid1", referencedColumnName: "id")]
    private ?Utilisateur $demandeur = null;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class)]
    #[ORM\JoinColumn(name: "utilisateurid2", referencedColumnName: "id")]
    private ?Utilisateur $destinataire = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_ajout = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getUtilisateurid1(): ?int
    {
        return $this->utilisateurid1;
    }

    public function setUtilisateurid1(int $utilisateurid1): static
    {
        $this->utilisateurid1 = $utilisateurid1;

        return $this;
    }

    public function getUtilisateurid2(): ?int
    {
        return $this->utilisateurid2;
    }

    public function setUtilisateurid2(int $utilisateurid2): static
    {
        $this->utilisateurid2 = $utilisateurid2;

        return $this;
    }


// Définir le demandeur
public function setDemandeur(Utilisateur $demandeur): self
{
    $this->utilisateurid1 = $demandeur->getId();  // Associe l'ID de l'utilisateur à la colonne utilisateurid1
    $this->demandeur = $demandeur;  // Optionnel: pour gérer la relation "ManyToOne"
    return $this;
}

// Définir le destinataire
public function setDestinataire(Utilisateur $destinataire): self
{
    $this->utilisateurid2 = $destinataire->getId();  // Associe l'ID de l'utilisateur à la colonne utilisateurid2
    $this->destinataire = $destinataire;  // Optionnel: pour gérer la relation "ManyToOne"
    return $this;
}

// Obtenir le demandeur
public function getDemandeur(): ?Utilisateur
{
    return $this->demandeur;
}

// Obtenir le destinataire
public function getDestinataire(): ?Utilisateur
{
    return $this->destinataire;
}

    public function getDateAjout(): ?\DateTimeInterface
    {
        return $this->date_ajout;
    }

    public function setDateAjout(\DateTimeInterface $date_ajout): static
    {
        $this->date_ajout = $date_ajout;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }
}