<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use App\Entity\Utilisateur;

#[ORM\Entity]
class Message
{

    #[ORM\Id]
    #[ORM\Column(type: "integer")]
    private int $id;

        #[ORM\ManyToOne(targetEntity: Conversation::class, inversedBy: "messages")]
    #[ORM\JoinColumn(name: 'conversation_id', referencedColumnName: 'id', onDelete: 'CASCADE')]
    private Conversation $conversation_id;

        #[ORM\ManyToOne(targetEntity: Utilisateur::class, inversedBy: "messages")]
    #[ORM\JoinColumn(name: 'utilisateurid', referencedColumnName: 'id', onDelete: 'CASCADE')]
    private Utilisateur $utilisateurid;

    #[ORM\Column(type: "text")]
    private string $contenu;

    #[ORM\Column(type: "date")]
    private \DateTimeInterface $date_envoi;

    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function getConversation_id()
    {
        return $this->conversation_id;
    }

    public function setConversation_id($value)
    {
        $this->conversation_id = $value;
    }

    public function getUtilisateurid()
    {
        return $this->utilisateurid;
    }

    public function setUtilisateurid($value)
    {
        $this->utilisateurid = $value;
    }

    public function getContenu()
    {
        return $this->contenu;
    }

    public function setContenu($value)
    {
        $this->contenu = $value;
    }

    public function getDate_envoi()
    {
        return $this->date_envoi;
    }

    public function setDate_envoi($value)
    {
        $this->date_envoi = $value;
    }
}
