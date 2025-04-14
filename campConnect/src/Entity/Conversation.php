<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use App\Entity\Ticket;
use Doctrine\Common\Collections\Collection;
use App\Entity\Message;

#[ORM\Entity]
class Conversation
{

    #[ORM\Id]
    #[ORM\Column(type: "integer")]
    private int $id;

        #[ORM\ManyToOne(targetEntity: Ticket::class, inversedBy: "conversations")]
    #[ORM\JoinColumn(name: 'ticketid', referencedColumnName: 'id', onDelete: 'CASCADE')]
    private Ticket $ticketid;

    #[ORM\Column(type: "date")]
    private \DateTimeInterface $date;

    #[ORM\Column(type: "integer")]
    private int $utilisateurid;

    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function getTicketid()
    {
        return $this->ticketid;
    }

    public function setTicketid($value)
    {
        $this->ticketid = $value;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($value)
    {
        $this->date = $value;
    }

    public function getUtilisateurid()
    {
        return $this->utilisateurid;
    }

    public function setUtilisateurid($value)
    {
        $this->utilisateurid = $value;
    }

    #[ORM\OneToMany(mappedBy: "conversation_id", targetEntity: Message::class)]
    private Collection $messages;

        public function getMessages(): Collection
        {
            return $this->messages;
        }
    
        public function addMessage(Message $message): self
        {
            if (!$this->messages->contains($message)) {
                $this->messages[] = $message;
                $message->setConversation_id($this);
            }
    
            return $this;
        }
    
        public function removeMessage(Message $message): self
        {
            if ($this->messages->removeElement($message)) {
                // set the owning side to null (unless already changed)
                if ($message->getConversation_id() === $this) {
                    $message->setConversation_id(null);
                }
            }
    
            return $this;
        }
}
