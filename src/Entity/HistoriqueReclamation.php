<?php

namespace App\Entity;

use App\Repository\HistoriqueReclamationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Reclamation;

#[ORM\Entity(repositoryClass: HistoriqueReclamationRepository::class)]
#[ORM\Table(name: 'historiquereclamation')]
class HistoriqueReclamation
{
    #[ORM\Id]
    #[ORM\Column(type: Types::STRING)]
    private ?string $date = null;
    
    #[ORM\Id]
    #[ORM\Column(type: Types::STRING)]
    private ?string $heure = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $details = null;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Reclamation::class)]
    #[ORM\JoinColumn(name: 'id_reclamation', referencedColumnName: 'id', nullable: false, onDelete: 'CASCADE')]
    private ?Reclamation $reclamation = null;

    public function __construct()
    {
        $now = new \DateTime();
        $this->setDate($now);
        $this->setHeure($now);
    }
    
    public function getDate(): ?\DateTimeInterface
    {
        return $this->date ? new \DateTime($this->date) : null;
    }
    
    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date->format('Y-m-d');
        return $this;
    }
    public function getHeure(): ?\DateTimeInterface
{
    return $this->heure ? new \DateTime($this->heure) : null;
}

public function setHeure(\DateTimeInterface $heure): static
{
    $this->heure = $heure->format('H:i:s');
    return $this;
}

    

    public function getId(): string
{
    $dateStr = $this->date?->format('Y-m-d') ?? '';
    $timeStr = $this->heure?->format('H:i:s') ?? '';
    $reclamationId = $this->reclamation?->getId() ?? '';

    return sprintf('%s_%s_%s', $dateStr, $timeStr, $reclamationId);
}


    public function getDetails(): ?string
    {
        return $this->details;
    }

    public function setDetails(?string $details): static
    {
        $this->details = $details;
        return $this;
    }

    public function getReclamation(): ?Reclamation
    {
        return $this->reclamation;
    }

    public function setReclamation(?Reclamation $reclamation): static
    {
        $this->reclamation = $reclamation;
        return $this;
    }
}
