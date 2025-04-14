<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\Collection;
use App\Entity\Panier;

#[ORM\Entity]
class Equipement
{

    #[ORM\Id]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\Column(type: "string", length: 255)]
    private string $nomEquip;

    #[ORM\Column(type: "integer")]
    private int $qte_dispo;

    #[ORM\Column(type: "float")]
    private float $prix;

    #[ORM\Column(type: "string", length: 255)]
    private string $image;

    #[ORM\Column(type: "text")]
    private string $description;

    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function getNomEquip()
    {
        return $this->nomEquip;
    }

    public function setNomEquip($value)
    {
        $this->nomEquip = $value;
    }

    public function getQte_dispo()
    {
        return $this->qte_dispo;
    }

    public function setQte_dispo($value)
    {
        $this->qte_dispo = $value;
    }

    public function getPrix()
    {
        return $this->prix;
    }

    public function setPrix($value)
    {
        $this->prix = $value;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($value)
    {
        $this->image = $value;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($value)
    {
        $this->description = $value;
    }

    #[ORM\OneToMany(mappedBy: "id_Equip", targetEntity: Panier::class)]
    private Collection $paniers;

        public function getPaniers(): Collection
        {
            return $this->paniers;
        }
    
        public function addPanier(Panier $panier): self
        {
            if (!$this->paniers->contains($panier)) {
                $this->paniers[] = $panier;
                $panier->setId_Equip($this);
            }
    
            return $this;
        }
    
        public function removePanier(Panier $panier): self
        {
            if ($this->paniers->removeElement($panier)) {
                // set the owning side to null (unless already changed)
                if ($panier->getId_Equip() === $this) {
                    $panier->setId_Equip(null);
                }
            }
    
            return $this;
        }
}
