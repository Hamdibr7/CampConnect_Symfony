<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use App\Entity\Camping;
use Doctrine\Common\Collections\Collection;
use App\Entity\Ticket;

#[ORM\Entity]
class Reclamation
{

    #[ORM\Id]
    #[ORM\Column(type: "integer")]
    private int $id;

        #[ORM\ManyToOne(targetEntity: Utilisateur::class, inversedBy: "reclamations")]
    #[ORM\JoinColumn(name: 'utilisateurid', referencedColumnName: 'id', onDelete: 'CASCADE')]
    private Utilisateur $utilisateurid;

        #[ORM\ManyToOne(targetEntity: Camping::class, inversedBy: "reclamations")]
    #[ORM\JoinColumn(name: 'campingid', referencedColumnName: 'id', onDelete: 'CASCADE')]
    private Camping $campingid;

    #[ORM\Column(type: "text")]
    private string $description;

    #[ORM\Column(type: "date")]
    private \DateTimeInterface $date;

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

    public function getUtilisateurid()
    {
        return $this->utilisateurid;
    }

    public function setUtilisateurid($value)
    {
        $this->utilisateurid = $value;
    }

    public function getCampingid()
    {
        return $this->campingid;
    }

    public function setCampingid($value)
    {
        $this->campingid = $value;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($value)
    {
        $this->description = $value;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($value)
    {
        $this->date = $value;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($value)
    {
        $this->status = $value;
    }

    #[ORM\OneToMany(mappedBy: "id_reclamation", targetEntity: Historiquereclamation::class)]
    private Collection $historiquereclamations;

    #[ORM\OneToMany(mappedBy: "id_reclamation", targetEntity: Ticket::class)]
    private Collection $tickets;
}
