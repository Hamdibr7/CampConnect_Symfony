<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Publication;
use App\Entity\Utilisateur;

#[ORM\Entity]
class Commentaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Publication::class, inversedBy: "commentaires")]
    #[ORM\JoinColumn(name: 'publicationid', referencedColumnName: 'id', onDelete: 'CASCADE')]
    private ?Publication $publicationid = null;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class, inversedBy: "commentaires")]
    #[ORM\JoinColumn(name: 'utilisateurid', referencedColumnName: 'id', onDelete: 'CASCADE')]
    private ?Utilisateur $utilisateurid = null;

    #[ORM\Column(type: "text")]
    private string $contenu;

    #[ORM\Column(type: "datetime")]
    private \DateTimeInterface $date;

    public function __construct()
    {
        $this->date = new \DateTime(); // Initialize the date to the current date
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $value): self
    {
        $this->id = $value;

        return $this;
    }

    public function getPublicationid(): ?Publication
    {
        return $this->publicationid;
    }

    public function setPublicationid(?Publication $value): self
    {
        $this->publicationid = $value;

        return $this;
    }

    public function getUtilisateurid(): ?Utilisateur
    {
        return $this->utilisateurid;
    }

    public function setUtilisateurid(?Utilisateur $value): self
    {
        $this->utilisateurid = $value;

        return $this;
    }

    public function getContenu(): string
    {
        return $this->contenu;
    }

    public function setContenu(string $value): self
    {
        $this->contenu = $value;

        return $this;
    }

    public function getDate(): \DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $value): self
    {
        $this->date = $value;

        return $this;
    }
}