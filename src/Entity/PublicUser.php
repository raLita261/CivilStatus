<?php

namespace App\Entity;

use App\Repository\PublicUserRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PublicUserRepository::class)
 */
class PublicUser
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $FName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $LName;

    /**
     * @ORM\Column(type="datetime")
     */
    private $DoB;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $placeOfBirth;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isAlive;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $DoD;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fatherName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fatherOccupation;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $motherName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $motherOccupation;



    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User")
     */
    private $user;
    /**
     * @ORM\Column(type="boolean")
     */
    private $gender;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFName(): ?string
    {
        return $this->FName;
    }

    public function setFName(string $FName): self
    {
        $this->FName = $FName;

        return $this;
    }

    public function getLName(): ?string
    {
        return $this->LName;
    }

    public function setLName(string $LName): self
    {
        $this->LName = $LName;

        return $this;
    }

    public function getDoB(): ?\DateTimeInterface
    {
        return $this->DoB;
    }

    public function setDoB(\DateTimeInterface $DoB): self
    {
        $this->DoB = $DoB;

        return $this;
    }

    public function getPlaceOfBirth(): ?string
    {
        return $this->placeOfBirth;
    }

    public function setPlaceOfBirth(string $placeOfBirth): self
    {
        $this->placeOfBirth = $placeOfBirth;

        return $this;
    }

    public function getIsAlive(): ?bool
    {
        return $this->isAlive;
    }

    public function setIsAlive(bool $isAlive): self
    {
        $this->isAlive = $isAlive;

        return $this;
    }

    public function getDoD(): ?\DateTimeInterface
    {
        return $this->DoD;
    }

    public function setDoD(?\DateTimeInterface $DoD): self
    {
        $this->DoD = $DoD;

        return $this;
    }

    public function getFatherName(): ?string
    {
        return $this->fatherName;
    }

    public function setFatherName(string $fatherName): self
    {
        $this->fatherName = $fatherName;

        return $this;
    }

    public function getFatherOccupation(): ?string
    {
        return $this->fatherOccupation;
    }

    public function setFatherOccupation(string $fatherOccupation): self
    {
        $this->fatherOccupation = $fatherOccupation;

        return $this;
    }

    public function getMotherName(): ?string
    {
        return $this->motherName;
    }

    public function setMotherName(string $motherName): self
    {
        $this->motherName = $motherName;

        return $this;
    }

    public function getMotherOccupation(): ?string
    {
        return $this->motherOccupation;
    }

    public function setMotherOccupation(string $motherOccupation): self
    {
        $this->motherOccupation = $motherOccupation;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getGender(): ?bool
    {
        return $this->gender;
    }

    public function setGender(bool $gender): self
    {
        $this->gender = $gender;

        return $this;
    }
}
