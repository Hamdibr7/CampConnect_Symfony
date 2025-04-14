<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\Collection;
use App\Entity\Chat_message;

#[ORM\Entity]
class Chat
{

    #[ORM\Id]
    #[ORM\Column(type: "integer")]
    private int $id;

    #[ORM\Column(type: "integer")]
    private int $user1;

    #[ORM\Column(type: "integer")]
    private int $user2;

    #[ORM\Column(type: "datetime")]
    private \DateTimeInterface $created_at;

    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function getUser1()
    {
        return $this->user1;
    }

    public function setUser1($value)
    {
        $this->user1 = $value;
    }

    public function getUser2()
    {
        return $this->user2;
    }

    public function setUser2($value)
    {
        $this->user2 = $value;
    }

    public function getCreated_at()
    {
        return $this->created_at;
    }

    public function setCreated_at($value)
    {
        $this->created_at = $value;
    }

    #[ORM\OneToMany(mappedBy: "chat_id", targetEntity: Chat_message::class)]
    private Collection $chat_messages;

        public function getChat_messages(): Collection
        {
            return $this->chat_messages;
        }
    
        public function addChat_message(Chat_message $chat_message): self
        {
            if (!$this->chat_messages->contains($chat_message)) {
                $this->chat_messages[] = $chat_message;
                $chat_message->setChat_id($this);
            }
    
            return $this;
        }
    
        public function removeChat_message(Chat_message $chat_message): self
        {
            if ($this->chat_messages->removeElement($chat_message)) {
                // set the owning side to null (unless already changed)
                if ($chat_message->getChat_id() === $this) {
                    $chat_message->setChat_id(null);
                }
            }
    
            return $this;
        }
}
