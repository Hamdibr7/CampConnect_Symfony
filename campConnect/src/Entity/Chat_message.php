<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

use App\Entity\Chat;

#[ORM\Entity]
class Chat_message
{

    #[ORM\Id]
    #[ORM\Column(type: "integer")]
    private int $id;

        #[ORM\ManyToOne(targetEntity: Chat::class, inversedBy: "chat_messages")]
    #[ORM\JoinColumn(name: 'chat_id', referencedColumnName: 'id', onDelete: 'CASCADE')]
    private Chat $chat_id;

    #[ORM\Column(type: "integer")]
    private int $sender_id;

    #[ORM\Column(type: "text")]
    private string $content;

    #[ORM\Column(type: "datetime")]
    private \DateTimeInterface $sent_at;

    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        $this->id = $value;
    }

    public function getChat_id()
    {
        return $this->chat_id;
    }

    public function setChat_id($value)
    {
        $this->chat_id = $value;
    }

    public function getSender_id()
    {
        return $this->sender_id;
    }

    public function setSender_id($value)
    {
        $this->sender_id = $value;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($value)
    {
        $this->content = $value;
    }

    public function getSent_at()
    {
        return $this->sent_at;
    }

    public function setSent_at($value)
    {
        $this->sent_at = $value;
    }
}
