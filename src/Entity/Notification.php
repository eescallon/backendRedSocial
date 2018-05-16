<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NotificationRepository")
 */
class Notification
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=3000)
     */
    private $notificacion;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $iduser;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $iduseraction;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Post")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idpost;

    public function getId()
    {
        return $this->id;
    }

    public function getNotificacion(): ?string
    {
        return $this->notificacion;
    }

    public function setNotificacion(string $notificacion): self
    {
        $this->notificacion = $notificacion;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getIduser(): ?User
    {
        return $this->iduser;
    }

    public function setIduser(?User $iduser): self
    {
        $this->iduser = $iduser;

        return $this;
    }

    public function getIduseraction(): ?User
    {
        return $this->iduseraction;
    }

    public function setIduseraction(?User $iduseraction): self
    {
        $this->iduseraction = $iduseraction;

        return $this;
    }

    public function getIdpost(): ?Post
    {
        return $this->idpost;
    }

    public function setIdpost(?Post $idpost): self
    {
        $this->idpost = $idpost;

        return $this;
    }
}
