<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use App\Entity\Reclamation;

#[ORM\Entity]
class Utilisateur
{

    #[ORM\Id]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\Column(type: "string", length: 255)]
    private string $email;

    #[ORM\Column(type: "string", length: 255)]
    private string $mdp;

    #[ORM\Column(type: "string", length: 255)]
    private string $nom;

    #[ORM\Column(type: "string", length: 255)]
    private string $prenom;

    #[ORM\Column(type: "integer")]
    private int $age;

    #[ORM\Column(type: "string", length: 255)]
    private string $pdp;

    #[ORM\Column(type: "text")]
    private string $bio;

    #[ORM\Column(type: "string")]
    private string $badges;

    public function __construct()
    {
        $this->campings = new ArrayCollection();
        $this->publications = new ArrayCollection();
        $this->amiss = new ArrayCollection();
        $this->amisAsTarget = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($value)
    {
        $this->email = $value;
    }

    public function getMdp()
    {
        return $this->mdp;
    }

    public function setMdp($value)
    {
        $this->mdp = $value;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($value)
    {
        $this->nom = $value;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($value)
    {
        $this->prenom = $value;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge($value)
    {
        $this->age = $value;
    }

    public function getPdp()
    {
        return $this->pdp;
    }

    public function setPdp($value)
    {
        $this->pdp = $value;
    }

    public function getBio()
    {
        return $this->bio;
    }

    public function setBio($value)
    {
        $this->bio = $value;
    }

    public function getBadges()
    {
        return $this->badges;
    }

    public function setBadges($value)
    {
        $this->badges = $value;
    }

    #[ORM\OneToMany(mappedBy: "utilisateurid", targetEntity: Camping::class)]
    private Collection $campings;

        public function getCampings(): Collection
        {
            return $this->campings;
        }
    
        public function addCamping(Camping $camping): self
        {
            if (!$this->campings->contains($camping)) {
                $this->campings[] = $camping;
                $camping->setUtilisateurid($this);
            }
    
            return $this;
        }
    
        public function removeCamping(Camping $camping): self
        {
            if ($this->campings->removeElement($camping)) {
                // set the owning side to null (unless already changed)
                if ($camping->getUtilisateurid() === $this) {
                    $camping->setUtilisateurid(null);
                }
            }
    
            return $this;
        }

    #[ORM\OneToMany(mappedBy: "utilisateurid", targetEntity: Publication::class)]
    private Collection $publications;

    #[ORM\OneToMany(mappedBy: "utilisateurid1", targetEntity: Amis::class)]
    private Collection $amiss;

        public function getAmiss(): Collection
        {
            return $this->amiss;
        }
    
        public function addAmis(Amis $amis): self
        {
            if (!$this->amiss->contains($amis)) {
                $this->amiss[] = $amis;
                $amis->setUtilisateurid1($this);
            }
    
            return $this;
        }
    
        public function removeAmis(Amis $amis): self
        {
            if ($this->amiss->removeElement($amis)) {
                // set the owning side to null (unless already changed)
                if ($amis->getUtilisateurid1() === $this) {
                    $amis->setUtilisateurid1(null);
                }
            }
    
            return $this;
        }

        #[ORM\OneToMany(mappedBy: "utilisateurid2", targetEntity: Amis::class)]
        private Collection $amisAsTarget;
        
        public function getAmisAsTarget(): Collection
        {
            return $this->amisAsTarget;
        }
        
        public function addAmisAsTarget(Amis $amis): self
        {
            if (!$this->amisAsTarget->contains($amis)) {
                $this->amisAsTarget[] = $amis;
                $amis->setUtilisateurid2($this);
            }
        
            return $this;
        }
        
        public function removeAmisAsTarget(Amis $amis): self
        {
            if ($this->amisAsTarget->removeElement($amis)) {
                // set the owning side to null (unless already changed)
                if ($amis->getUtilisateurid2() === $this) {
                    $amis->setUtilisateurid2(null);
                }
            }
        
            return $this;
        }

    #[ORM\OneToMany(mappedBy: "utilisateurid", targetEntity: Avis::class)]
    private Collection $aviss;

    #[ORM\OneToMany(mappedBy: "utilisateurid", targetEntity: Likes::class)]
    private Collection $likess;

    #[ORM\OneToMany(mappedBy: "id_utilisateur", targetEntity: Panier::class)]
    private Collection $paniers;

        public function getPaniers(): Collection
        {
            return $this->paniers;
        }
    
        public function addPanier(Panier $panier): self
        {
            if (!$this->paniers->contains($panier)) {
                $this->paniers[] = $panier;
                $panier->setId_utilisateur($this);
            }
    
            return $this;
        }
    
        public function removePanier(Panier $panier): self
        {
            if ($this->paniers->removeElement($panier)) {
                // set the owning side to null (unless already changed)
                if ($panier->getId_utilisateur() === $this) {
                    $panier->setId_utilisateur(null);
                }
            }
    
            return $this;
        }

    #[ORM\OneToMany(mappedBy: "utilisateurid", targetEntity: Reservation::class)]
    private Collection $reservations;

    #[ORM\OneToMany(mappedBy: "utilisateurid", targetEntity: Commentaire::class)]
    private Collection $commentaires;

    #[ORM\OneToMany(mappedBy: "id_utilisateur", targetEntity: Ticket::class)]
    private Collection $tickets;

    #[ORM\OneToMany(mappedBy: "utilisateurid", targetEntity: Message::class)]
    private Collection $messages;

    #[ORM\OneToMany(mappedBy: "utilisateurid", targetEntity: Reclamation::class)]
    private Collection $reclamations;
}
