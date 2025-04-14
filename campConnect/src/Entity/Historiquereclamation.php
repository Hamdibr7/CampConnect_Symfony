<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use App\Entity\Reclamation;

#[ORM\Entity]
class Historiquereclamation
{

    #[ORM\Id]
    #[ORM\Column(type: "integer")]
    private int $id;

        #[ORM\ManyToOne(targetEntity: Reclamation::class, inversedBy: "historiquereclamations")]
    #[ORM\JoinColumn(name: 'id_reclamation', referencedColumnName: 'id', onDelete: 'CASCADE')]
    private Reclamation $id_reclamation;

    #[ORM\Column(type: "date")]
    private \DateTimeInterface $date;

    #[ORM\Column(type: "string")]
    private string $heure;

    #[ORM\Column(type: "text")]
    private string $details;

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

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($value)
    {
        $this->date = $value;
    }

    public function getHeure()
    {
        return $this->heure;
    }

    public function setHeure($value)
    {
        $this->heure = $value;
    }

    public function getDetails()
    {
        return $this->details;
    }

    public function setDetails($value)
    {
        $this->details = $value;
    }
}
