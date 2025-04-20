<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Notification;
#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
class Utilisateur implements UserInterface, PasswordAuthenticatedUserInterface
{
    






    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    #[Assert\Regex(
        pattern: '/^[a-zA-Z0-9._%+-]+@gmail\.com$/',
        message: "L'email doit être un Gmail valide (ex : nom@gmail.com)."
    )]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    #[Assert\Regex(
        pattern: '/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]+$/',
        message: "Le mot de passe doit contenir au moins une lettre et un chiffre."
    )]
    private ?string $mdp = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    #[Assert\Length(max: 7, maxMessage: "Le nom ne doit pas dépasser 7 caractères.")]
    #[Assert\Regex(
        pattern: '/^[A-Z][a-zA-Z]*$/',
        message: "Le nom doit commencer par une majuscule et ne contenir que des lettres."
    )]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    #[Assert\Length(max: 7, maxMessage: "Le prénom ne doit pas dépasser 7 caractères.")]
    #[Assert\Regex(
        pattern: '/^[A-Z][a-zA-Z]*$/',
        message: "Le prénom doit commencer par une majuscule et ne contenir que des lettres."
    )]
    private ?string $prenom = null;

    #[ORM\Column]
    #[Assert\NotNull]
    #[Assert\Range(
        min: 10,
        max: 99,
        notInRangeMessage: "L'âge doit être compris entre {{ min }} et {{ max }}."
    )]
    private ?int $age = null;

    #[ORM\Column(length: 255)]
    private ?string $pdp = null;

    // --- Getters et setters classiques ---
    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;
        return $this;
    }

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(string $mdp): static
    {
        $this->mdp = $mdp;
        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;
        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;
        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): static
    {
        $this->age = $age;
        return $this;
    }

    public function getPdp(): ?string
    {
        return $this->pdp;
    }

    public function setPdp(string $pdp): static
    {
        $this->pdp = $pdp;
        return $this;
    }

    // --- Méthodes pour UserInterface / PasswordAuthenticatedUserInterface ---

    public function getUserIdentifier(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->mdp;
    }

    public function getRoles(): array
    {
        if ($this->email === 'admincamp@gmail.com') {
            return ['ROLE_ADMIN'];
        }
    
        return ['ROLE_USER'];
    }
    

    public function eraseCredentials(): void
    {
        // Si tu stockes des données temporaires sensibles, vide-les ici
    }
  
}
