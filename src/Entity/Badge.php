<?php

namespace App\Entity;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Repository\BadgeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BadgeRepository::class)]
class Badge
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_badge = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $reservations_requises = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    // Temporary property for handling uploaded image (not persisted to DB)
private ?UploadedFile $imageFile = null;

public function getImageFile(): ?UploadedFile
{
    return $this->imageFile;
}

public function setImageFile(?UploadedFile $imageFile): static
{
    $this->imageFile = $imageFile;

    return $this;
}

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
}
