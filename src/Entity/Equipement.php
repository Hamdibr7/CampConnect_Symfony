<?php

namespace App\Entity;

use App\Repository\EquipementRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: EquipementRepository::class)]
class Equipement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "id", type: "integer")]
    private ?int $id = null;

    #[ORM\Column(name: "nomEquip", type: "string", length: 255)]
    #[Assert\NotBlank(message: "Le nom de l'équipement est obligatoire")]
    #[Assert\Regex(
        pattern: "/^[a-zA-ZÀ-ÿ\s\-']+$/",
        message: "Le nom ne doit contenir que des lettres et des espaces"
    )]
    private ?string $nomEquip = null;

    #[ORM\Column(name: "qte_dispo", type: "integer")]
    #[SerializedName('qte_dispo')]
    #[Assert\NotBlank(message: "La quantité est obligatoire")]
    #[Assert\Positive(message: "La quantité doit être positive")]
    #[Assert\Type(
        type: "integer",
        message: "La quantité doit être un nombre entier"
    )]
    private ?int $qte_dispo = null;

    #[ORM\Column(name: "prix", type: "float")]
    #[Assert\NotBlank(message: "Le prix est obligatoire")]
    #[Assert\Positive(message: "Le prix doit être positif")]
    #[Assert\Type(
        type: "float",
        message: "Le prix doit être un nombre"
    )]
    private ?float $prix = null;

    #[ORM\Column(name: "image", type: "string", length: 255, nullable: true)]
    private ?string $image = null;

    #[ORM\Column(name: "description", type: "text", nullable: true)]
    private ?string $description = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;
        return $this;
    }

    public function getNomEquip(): ?string
    {
        return $this->nomEquip;
    }

    public function setNomEquip(string $nomEquip): static
    {
        $this->nomEquip = $nomEquip;
        return $this;
    }

    public function getQteDispo(): ?int
    {
        return $this->qte_dispo;
    }

    public function setQteDispo(int $qte_dispo): static
    {
        $this->qte_dispo = $qte_dispo;
        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): static
    {
        $this->prix = $prix;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Magic method for property access
     */
    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    /**
     * Magic method for property exists check
     */
    public function __isset($property)
    {
        return property_exists($this, $property);
    }
}