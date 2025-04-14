<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use App\Entity\Utilisateur;
use App\Entity\Commentaire;
use App\Entity\Likes;

#[ORM\Entity]
class Publication
{
    #[ORM\Id]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class, inversedBy: "publications")]
    #[ORM\JoinColumn(name: 'utilisateurid', referencedColumnName: 'id', onDelete: 'CASCADE')]
    private Utilisateur $utilisateurid;

    #[ORM\Column(type: "text")]
    private string $contenu;

    #[ORM\Column(type: "string", length: 50)]
    private string $type_pub;

    #[ORM\Column(type: "datetime")]
    private \DateTimeInterface $date;

    #[ORM\Column(type: "text")]
    private string $description;

    #[ORM\OneToMany(mappedBy: "publicationid", targetEntity: Likes::class)]
    private Collection $likess;

    #[ORM\OneToMany(mappedBy: "publicationid", targetEntity: Commentaire::class)]
    private Collection $commentaires;

    public function __construct()
    {
        $this->likess = new ArrayCollection();
        $this->commentaires = new ArrayCollection();
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

    public function getUtilisateurid(): Utilisateur
    {
        return $this->utilisateurid;
    }

    public function setUtilisateurid(Utilisateur $value): self
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

    public function getTypePub(): string
    {
        return $this->type_pub;
    }

    public function setTypePub(string $value): self
    {
        $this->type_pub = $value;

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

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $value): self
    {
        $this->description = $value;

        return $this;
    }

    public function getLikess(): Collection
    {
        return $this->likess;
    }

    public function addLikes(Likes $likes): self
    {
        if (!$this->likess->contains($likes)) {
            $this->likess[] = $likes;
            $likes->setPublicationid($this);
        }

        return $this;
    }

    public function removeLikes(Likes $likes): self
    {
        if ($this->likess->removeElement($likes)) {
            // Set the owning side to null (unless already changed)
            if ($likes->getPublicationid() === $this) {
                $likes->setPublicationid(null);
            }
        }

        return $this;
    }

    public function getCommentaires(): Collection
    {
        return $this->commentaires;
    }

    public function addCommentaire(Commentaire $commentaire): self
    {
        if (!$this->commentaires->contains($commentaire)) {
            $this->commentaires[] = $commentaire;
            $commentaire->setPublicationid($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): self
    {
        if ($this->commentaires->removeElement($commentaire)) {
            // Set the owning side to null (unless already changed)
            if ($commentaire->getPublicationid() === $this) {
                $commentaire->setPublicationid(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->contenu;
    }

}