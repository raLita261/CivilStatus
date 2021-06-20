<?php

namespace App\Entity;

use App\Repository\BirthRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BirthRepository::class)
 */
class Birth
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date" , nullable = true)
     */
    private $declarationDate;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\PublicUser")
     */
    private $publicUser;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $officeLocation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $officier;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $payment;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $status;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDeclarationDate(): ?\DateTimeInterface
    {
        return $this->declarationDate;
    }

    public function setDeclarationDate(?\DateTimeInterface $declarationDate): self
    {
        $this->declarationDate = $declarationDate;

        return $this;
    }

    public function getOfficeLocation(): ?string
    {
        return $this->officeLocation;
    }

    public function setOfficeLocation(?string $officeLocation): self
    {
        $this->officeLocation = $officeLocation;

        return $this;
    }

    public function getOfficier(): ?string
    {
        return $this->officier;
    }

    public function setOfficier(?string $officier): self
    {
        $this->officier = $officier;

        return $this;
    }

    public function getPayment(): ?string
    {
        return $this->payment;
    }

    public function setPayment(?string $payment): self
    {
        $this->payment = $payment;

        return $this;
    }

    public function getPublicUser(): ?PublicUser
    {
        return $this->publicUser;
    }

    public function setPublicUser(?PublicUser $publicUser): self
    {
        $this->publicUser = $publicUser;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }
}
