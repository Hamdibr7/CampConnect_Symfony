<?php

namespace App\Entity;

use App\Repository\ReclamationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

#[ORM\Entity(repositoryClass: ReclamationRepository::class)]
#[ORM\Table(name: 'reclamation')]
class Reclamation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message: 'La description est obligatoire')]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    #[Assert\Choice(choices: ['En attente', 'En cours', 'Traité'])]
    private ?string $status = 'En attente';

    #[ORM\ManyToOne(targetEntity: Utilisateur::class)]
    #[ORM\JoinColumn(name: 'utilisateurid', referencedColumnName: 'id', nullable: false)]
    private ?Utilisateur $utilisateur = null;

    #[ORM\ManyToOne(targetEntity: Camping::class)]
    #[ORM\JoinColumn(name: 'campingid', referencedColumnName: 'id', nullable: false)]
    #[Assert\NotNull(message: 'Le camping est obligatoire')]
    private ?Camping $camping = null;

    #[ORM\OneToMany(mappedBy: 'reclamation', targetEntity: Ticket::class, orphanRemoval: true)]
    private Collection $tickets;

    public function __construct()
    {
        $this->tickets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;
        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;
        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): static
    {
        $this->utilisateur = $utilisateur;
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

    /**
     * @return Collection<int, Ticket>
     */
    public function getTickets(): Collection
    {
        return $this->tickets;
    }

    public function addTicket(Ticket $ticket): static
    {
        if (!$this->tickets->contains($ticket)) {
            $this->tickets->add($ticket);
            $ticket->setReclamation($this);
        }

        return $this;
    }

    public function removeTicket(Ticket $ticket): static
    {
        if ($this->tickets->removeElement($ticket)) {
            if ($ticket->getReclamation() === $this) {
                $ticket->setReclamation(null);
            }
        }

        return $this;
    }

    //les mots interdits
    #[Assert\Callback]
    public function validateBadWords(ExecutionContextInterface $context, $payload)
    {
        $badWords = ['merde', 'con', 'idiot', 'pute', 'bordel','fuck', 'fuck you', 'bitch', 'hoe']; 
        $descriptionLower = strtolower($this->description ?? '');

        foreach ($badWords as $badWord) {
            if (str_contains($descriptionLower, $badWord)) {
                $context->buildViolation('La description contient un mot interdit : "' . $badWord . '"')
                    ->atPath('description')
                    ->addViolation();
            }
        }
    }
}
