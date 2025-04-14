<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use App\Entity\Utilisateur;
use Doctrine\Common\Collections\Collection;
use App\Entity\Reclamation;

#[ORM\Entity]
class Camping
{

    #[ORM\Id]
    #[ORM\Column(type: "integer")]
    private int $id;

        #[ORM\ManyToOne(targetEntity: Utilisateur::class, inversedBy: "campings")]
    #[ORM\JoinColumn(name: 'utilisateurid', referencedColumnName: 'id', onDelete: 'CASCADE')]
    private Utilisateur $utilisateurid;

    #[ORM\Column(type: "string", length: 255)]
    private string $nom;

    #[ORM\Column(type: "text")]
    private string $adresse;

    #[ORM\Column(type: "text")]
    private string $description;

    #[ORM\Column(type: "string", length: 255)]
    private string $ville;

    #[ORM\Column(type: "string", length: 255)]
    private string $pays;

    #[ORM\Column(type: "date")]
    private \DateTimeInterface $Date_Deb;

    #[ORM\Column(type: "date")]
    private \DateTimeInterface $Date_Fin;

    #[ORM\Column(type: "string", length: 255)]
    private string $image;

    #[ORM\Column(type: "float")]
    private float $montant;

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

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($value)
    {
        $this->nom = $value;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }

    public function setAdresse($value)
    {
        $this->adresse = $value;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($value)
    {
        $this->description = $value;
    }

    public function getVille()
    {
        return $this->ville;
    }

    public function setVille($value)
    {
        $this->ville = $value;
    }

    public function getPays()
    {
        return $this->pays;
    }

    public function setPays($value)
    {
        $this->pays = $value;
    }

    public function getDate_Deb()
    {
        return $this->Date_Deb;
    }

    public function setDate_Deb($value)
    {
        $this->Date_Deb = $value;
    }

    public function getDate_Fin()
    {
        return $this->Date_Fin;
    }

    public function setDate_Fin($value)
    {
        $this->Date_Fin = $value;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($value)
    {
        $this->image = $value;
    }

    public function getMontant()
    {
        return $this->montant;
    }

    public function setMontant($value)
    {
        $this->montant = $value;
    }

    #[ORM\OneToMany(mappedBy: "campingid", targetEntity: Avis::class)]
    private Collection $aviss;

        public function getAviss(): Collection
        {
            return $this->aviss;
        }
    
        public function addAvis(Avis $avis): self
        {
            if (!$this->aviss->contains($avis)) {
                $this->aviss[] = $avis;
                $avis->setCampingid($this);
            }
    
            return $this;
        }
    
        public function removeAvis(Avis $avis): self
        {
            if ($this->aviss->removeElement($avis)) {
                // set the owning side to null (unless already changed)
                if ($avis->getCampingid() === $this) {
                    $avis->setCampingid(null);
                }
            }
    
            return $this;
        }

    #[ORM\OneToMany(mappedBy: "campingid", targetEntity: Reservation::class)]
    private Collection $reservations;

    #[ORM\OneToMany(mappedBy: "campingid", targetEntity: Reclamation::class)]
    private Collection $reclamations;
}
