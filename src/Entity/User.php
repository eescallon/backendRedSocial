<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=300, nullable=true)
     */
    private $password;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Person", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $idPerson;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Friends")
     */
    private $iduser;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Friends")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idfriend;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Notification", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $idnotification;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Like", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $idlike;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Messages", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $idmessages;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Comments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idcommentary;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Post")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idpost;

    public function getId()
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getIdPerson(): ?Person
    {
        return $this->idPerson;
    }

    public function setIdPerson(Person $idPerson): self
    {
        $this->idPerson = $idPerson;

        return $this;
    }

    public function getIduser(): ?Friends
    {
        return $this->iduser;
    }

    public function setIduser(?Friends $iduser): self
    {
        $this->iduser = $iduser;

        return $this;
    }

    public function getIdfriend(): ?Friends
    {
        return $this->idfriend;
    }

    public function setIdfriend(?Friends $idfriend): self
    {
        $this->idfriend = $idfriend;

        return $this;
    }

    public function getIdnotification(): ?Notification
    {
        return $this->idnotification;
    }

    public function setIdnotification(Notification $idnotification): self
    {
        $this->idnotification = $idnotification;

        return $this;
    }

    public function getIdlike(): ?Like
    {
        return $this->idlike;
    }

    public function setIdlike(Like $idlike): self
    {
        $this->idlike = $idlike;

        return $this;
    }

    public function getIdmessages(): ?Messages
    {
        return $this->idmessages;
    }

    public function setIdmessages(Messages $idmessages): self
    {
        $this->idmessages = $idmessages;

        return $this;
    }

    public function getIdcommentary(): ?Comments
    {
        return $this->idcommentary;
    }

    public function setIdcommentary(?Comments $idcommentary): self
    {
        $this->idcommentary = $idcommentary;

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
