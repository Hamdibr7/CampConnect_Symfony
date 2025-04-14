<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use App\Entity\Utilisateur;
use Doctrine\Common\Collections\Collection;
use App\Entity\Conversation;

#[ORM\Entity]
class Ticket
{

    #[ORM\Id]
    #[ORM\Column(type: "integer")]
    private int $id;

        #[ORM\ManyToOne(targetEntity: Reclamation::class, inversedBy: "tickets")]
    #[ORM\JoinColumn(name: 'id_reclamation', referencedColumnName: 'id', onDelete: 'CASCADE')]
    private Reclamation $id_reclamation;

        #[ORM\ManyToOne(targetEntity: Utilisateur::class, inversedBy: "tickets")]
    #[ORM\JoinColumn(name: 'id_utilisateur', referencedColumnName: 'id', onDelete: 'CASCADE')]
    private Utilisateur $id_utilisateur;

    #[ORM\Column(type: "text")]
    private string $description;

    #[ORM\Column(type: "date")]
    private \DateTimeInterface $date_creat;

    #[ORM\Column(type: "string", length: 255)]
    private string $status;

    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function getId_reclamation()
    {
        return $this->id_reclamation;
    }

    public function setId_reclamation($value)
    {
        $this->id_reclamation = $value;
    }

    public function getId_utilisateur()
    {
        return $this->id_utilisateur;
    }

    public function setId_utilisateur($value)
    {
        $this->id_utilisateur = $value;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($value)
    {
        $this->description = $value;
    }

    public function getDate_creat()
    {
        return $this->date_creat;
    }

    public function setDate_creat($value)
    {
        $this->date_creat = $value;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($value)
    {
        $this->status = $value;
    }

    #[ORM\OneToMany(mappedBy: "ticketid", targetEntity: Conversation::class)]
    private Collection $conversations;
}
