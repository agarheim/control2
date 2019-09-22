<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ChatRepository")
 */
class Chat
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $DatePub;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $TextChat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatePub(): ?\DateTimeInterface
    {
        return $this->DatePub;
    }

    public function setDatePub(\DateTimeInterface $DatePub): self
    {
        $this->DatePub = $DatePub;

        return $this;
    }

    public function getTextChat(): ?string
    {
        return $this->TextChat;
    }

    public function setTextChat(string $TextChat): self
    {
        $this->TextChat = $TextChat;

        return $this;
    }
}
