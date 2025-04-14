<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use App\Entity\Utilisateur;

#[ORM\Entity]
class Amis
{

    #[ORM\Id]
    #[ORM\Column(type: "integer")]
    private int $id;

        #[ORM\ManyToOne(targetEntity: Utilisateur::class, inversedBy: "amiss")]
    #[ORM\JoinColumn(name: 'utilisateurid1', referencedColumnName: 'id', onDelete: 'CASCADE')]
    private Utilisateur $utilisateurid1;

        #[ORM\ManyToOne(targetEntity: Utilisateur::class, inversedBy: "amiss")]
    #[ORM\JoinColumn(name: 'utilisateurid2', referencedColumnName: 'id', onDelete: 'CASCADE')]
    private Utilisateur $utilisateurid2;

    #[ORM\Column(type: "date")]
    private \DateTimeInterface $date_ajout;

    #[ORM\Column(type: "string", length: 50)]
    private string $status;

    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function getUtilisateurid1()
    {
        return $this->utilisateurid1;
    }

    public function setUtilisateurid1($value)
    {
        $this->utilisateurid1 = $value;
    }

    public function getUtilisateurid2()
    {
        return $this->utilisateurid2;
    }

    public function setUtilisateurid2($value)
    {
        $this->utilisateurid2 = $value;
    }

    public function getDate_ajout()
    {
        return $this->date_ajout;
    }

    public function setDate_ajout($value)
    {
        $this->date_ajout = $value;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($value)
    {
        $this->status = $value;
    }
}
