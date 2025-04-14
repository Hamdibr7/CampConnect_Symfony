<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Notification
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private string $message;

    #[ORM\Column]
    private \DateTimeInterface $date_creation;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Utilisateur $utilisateur;

    public function __construct(string $message, Utilisateur $utilisateur)
    {
        $this->message = $message;
        $this->date_creation = new \DateTime();
        $this->utilisateur = $utilisateur;
    }

    // Getters et setters

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getDateCreation(): \DateTimeInterface
    {
        return $this->date_creation;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }
}
