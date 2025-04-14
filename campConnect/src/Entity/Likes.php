<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Constants\Reaction;

#[ORM\Entity]
class Likes
{
    #[ORM\Id]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\ManyToOne(targetEntity: Publication::class, inversedBy: "likess")]
    #[ORM\JoinColumn(name: 'publicationid', referencedColumnName: 'id', onDelete: 'CASCADE')]
    private ?Publication $publicationid = null;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class, inversedBy: "likess")]
    #[ORM\JoinColumn(name: 'utilisateurid', referencedColumnName: 'id', onDelete: 'CASCADE')]
    private ?Utilisateur $utilisateurid = null;

    #[ORM\Column(type: "integer")]
    private int $reaction_type;

    #[ORM\Column(type: "date")]
    private \DateTimeInterface $date;

    public function __construct()
    {
        $this->date = new \DateTime(); // Initialize the date to the current date
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $value): self
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

    public function getReactionType(): int
    {
        return $this->reaction_type;
    }

    public function setReactionType(int $value): self
    {
        $this->reaction_type = $value;

        return $this;
    }

    public function getReactionDetails(): ?array
    {
        return Reaction::fromId($this->reaction_type);
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