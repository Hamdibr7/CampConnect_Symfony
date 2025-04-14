<?php

namespace App\Entity;

use App\Repository\BadgeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity(repositoryClass: BadgeRepository::class)]
#[UniqueEntity(fields: ['nom_badge'], message: 'Ce nom de badge existe déjà.')]
#[UniqueEntity(fields: ['reservations_requises'], message: 'Ce nombre de réservations est déjà attribué à un autre badge.')]
class Badge
{
  
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Le nom du badge est obligatoire.")]
    #[Assert\Length(
        min: 3,
        max: 100,
        minMessage: "Le nom doit contenir au moins {{ limit }} caractères.",
        maxMessage: "Le nom ne peut pas dépasser {{ limit }} caractères."
    )]
    private ?string $nom_badge = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message: "La description est obligatoire.")]
    #[Assert\Length(
        max: 255,
        maxMessage: "La description ne peut pas dépasser {{ limit }} caractères."
    )]
    #[Assert\Regex(
        pattern: "/[a-zA-Z0-9]/",
        message: "La description doit contenir au moins une lettre ou un chiffre."
    )]
    private ?string $description = null;
    
    #[ORM\Column]
    #[Assert\NotNull(message: "Le nombre de réservations est requis.")]
    #[Assert\PositiveOrZero(message: "Le nombre de réservations doit être positif ou nul.")]
    private ?int $reservations_requises = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    // Fichier temporaire pour les uploads (non stocké en base)
    #[Assert\File(
        maxSize: "2M",
        maxSizeMessage: "L'image ne doit pas dépasser 2 Mo.",
        mimeTypes: ["image/jpeg", "image/png", "image/webp", "image/jpg"],
        mimeTypesMessage: "Le fichier doit être une image valide (jpeg, png, webp, jpg)."
    )]
    private ?UploadedFile $imageFile = null;

    // Getters / Setters

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;
        return $this;
    }

    public function getNomBadge(): ?string
    {
        return $this->nom_badge;
    }

    public function setNomBadge(string $nom_badge): static
    {
        $this->nom_badge = $nom_badge;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;
        return $this;
    }

    public function getReservationsRequises(): ?int
    {
        return $this->reservations_requises;
    }

    public function setReservationsRequises(int $reservations_requises): static
    {
        $this->reservations_requises = $reservations_requises;
        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): static
    {
        $this->image = $image;
        return $this;
    }

    public function getImageFile(): ?UploadedFile
    {
        return $this->imageFile;
    }

    public function setImageFile(?UploadedFile $imageFile): static
    {
        $this->imageFile = $imageFile;
        return $this;
    }
}
