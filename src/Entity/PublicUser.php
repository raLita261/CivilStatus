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
     * @ORM\Column(type="date")
     */
    private $DoB;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $FatherName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $MotherName;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Status;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $DoD;

    
    /**
     * @ORM\Column(type="integer")
     */
    private $VerificationCode;

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

    public function getFatherName(): ?string
    {
        return $this->FatherName;
    }

    public function setFatherName(string $FatherName): self
    {
        $this->FatherName = $FatherName;

        return $this;
    }

    public function getMotherName(): ?string
    {
        return $this->MotherName;
    }

    public function setMotherName(string $MotherName): self
    {
        $this->MotherName = $MotherName;

        return $this;
    }

    public function getStatus(): ?bool
    {
        return $this->Status;
    }

    public function setStatus(bool $Status): self
    {
        $this->Status = $Status;

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
}
