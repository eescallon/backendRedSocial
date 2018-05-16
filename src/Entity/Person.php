<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PersonRepository")
 */
class Person
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lastname;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $birthday;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $address;

    /**
     * @ORM\Column(type="integer")
     */
    private $phonenumber;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Career")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idcareer;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Typeperson")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idtypeperson;

    public function getId()
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(?string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(?\DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getPhonenumber(): ?int
    {
        return $this->phonenumber;
    }

    public function setPhonenumber(int $phonenumber): self
    {
        $this->phonenumber = $phonenumber;

        return $this;
    }

    public function getIdcareer(): ?Career
    {
        return $this->idcareer;
    }

    public function setIdcareer(?Career $idcareer): self
    {
        $this->idcareer = $idcareer;

        return $this;
    }

    public function getIdtypeperson(): ?Typeperson
    {
        return $this->idtypeperson;
    }

    public function setIdtypeperson(?Typeperson $idtypeperson): self
    {
        $this->idtypeperson = $idtypeperson;

        return $this;
    }
}
