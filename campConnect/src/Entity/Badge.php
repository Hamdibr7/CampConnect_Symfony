<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity]
class Badge
{

    #[ORM\Id]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\Column(type: "string", length: 255)]
    private string $nom_badge;

    #[ORM\Column(type: "text")]
    private string $description;

    #[ORM\Column(type: "integer")]
    private int $reservations_requises;

    #[ORM\Column(type: "string", length: 255)]
    private string $image;

    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function getNom_badge()
    {
        return $this->nom_badge;
    }

    public function setNom_badge($value)
    {
        $this->nom_badge = $value;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($value)
    {
        $this->description = $value;
    }

    public function getReservations_requises()
    {
        return $this->reservations_requises;
    }

    public function setReservations_requises($value)
    {
        $this->reservations_requises = $value;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($value)
    {
        $this->image = $value;
    }
}
