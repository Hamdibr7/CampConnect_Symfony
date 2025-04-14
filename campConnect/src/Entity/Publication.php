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
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class, inversedBy: "publications")]
    #[ORM\JoinColumn(name: 'utilisateurid', referencedColumnName: 'id', onDelete: 'CASCADE')]
    private ?Utilisateur $utilisateurid = null;

    #[ORM\Column(type: "text")]
    private string $contenu = '';

    #[ORM\Column(type: "string", length: 50)]
    private string $type_pub = 'text';

    #[ORM\Column(type: "datetime")]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(type: "text")]
    private string $description = '';

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $media_url = null;

    #[ORM\Column(type: "string", length: 20, nullable: true)]
    private ?string $media_type = null;

    #[ORM\OneToMany(mappedBy: "publicationid", targetEntity: Likes::class)]
    private Collection $likess;

    #[ORM\OneToMany(mappedBy: "publicationid", targetEntity: Commentaire::class)]
    private Collection $commentaires;

    public function __construct()
    {
        $this->likess = new ArrayCollection();
        $this->commentaires = new ArrayCollection();
        $this->date = new \DateTime();
        $this->type_pub = 'text';
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUtilisateurid(): ?Utilisateur
    {
        return $this->utilisateurid;
    }

    public function setUtilisateurid(?Utilisateur $utilisateurid): self
    {
        $this->utilisateurid = $utilisateurid;
        return $this;
    }

    public function getContenu(): string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;
        return $this;
    }

    public function getTypePub(): string
    {
        return $this->type_pub;
    }

    public function setTypePub(string $type_pub): self
    {
        $this->type_pub = $type_pub;
        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getMediaUrl(): ?string
    {
        return $this->media_url;
    }

    public function setMediaUrl(?string $media_url): self
    {
        $this->media_url = $media_url;
        return $this;
    }

    public function getMediaType(): ?string
    {
        return $this->media_type;
    }

    public function setMediaType(?string $media_type): self
    {
        $this->media_type = $media_type;
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