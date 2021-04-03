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
     * @ORM\Column(type="integer")
     */
    private $VerificationCode;



    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ParentUser")
     */
    private $father;



    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ParentUser")
     */
    private $mother;

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

    public function getVerificationCode(): ?int
    {
        return $this->VerificationCode;
    }

    public function setVerificationCode(int $VerificationCode): self
    {
        $this->VerificationCode = $VerificationCode;

        return $this;
    }

    public function getFather(): ?ParentUser
    {
        return $this->father;
    }

    public function setFather(?ParentUser $father): self
    {
        $this->father = $father;

        return $this;
    }

    public function getMother(): ?ParentUser
    {
        return $this->mother;
    }

    public function setMother(?ParentUser $mother): self
    {
        $this->mother = $mother;

        return $this;
    }
}
