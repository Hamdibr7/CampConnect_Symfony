<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use App\Entity\Camping;






#[ORM\Entity(repositoryClass: ReservationRepository::class)]
#[Gedmo\SoftDeleteable(fieldName: 'deletedAt', timeAware: false)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'integer')]
    private ?int $utilisateurid = null;

    #[ORM\ManyToOne(targetEntity: Camping::class)]
    #[ORM\JoinColumn(name: 'campingid', referencedColumnName: 'id', nullable: false)]
    private ?Camping $camping = null;

    #[ORM\Column(type: 'float')]
    private ?float $montant = 0;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $statut = 'active';

    #[ORM\Column(type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $deletedAt = null;


    public function getDeletedAt(): ?\DateTimeInterface
    {
        return $this->deletedAt;
    }

    public function setDeletedAt(?\DateTimeInterface $deletedAt): static
    {
        $this->deletedAt = $deletedAt;
        return $this;
}

    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUtilisateurid(): ?int
    {
        return $this->utilisateurid;
    }

    public function setUtilisateurid(int $utilisateurid): static
    {
        $this->utilisateurid = $utilisateurid;
        return $this;
    }

    public function getCamping(): ?Camping
    {
        return $this->camping;
    }

    public function setCamping(?Camping $camping): static
    {
        $this->camping = $camping;
        return $this;
    }

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(float $montant): static
    {
        $this->montant = $montant;
        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(?string $statut): static
    {
        $this->statut = $statut;
        return $this;
    }
}
