<?php

namespace App\Entity;

use App\Repository\MariageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MariageRepository::class)
 */
class Mariage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

     /**
     * @ORM\Column(type="date")
     */
    private $mariageDate;


    /**
     * @ORM\Column(type="date")
     */
    private $declarationDate;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\PublicUser")
     */
    private $husband;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\PublicUser")
     */
    private $wife;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\PublicUser")
     */
    private $temoin;

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

    public function setDeclarationDate(\DateTimeInterface $declarationDate): self
    {
        $this->declarationDate = $declarationDate;

        return $this;
    }

    public function getHusband(): ?PublicUser
    {
        return $this->husband;
    }

    public function setHusband(?PublicUser $husband): self
    {
        $this->husband = $husband;

        return $this;
    }

    public function getWife(): ?PublicUser
    {
        return $this->wife;
    }

    public function setWife(?PublicUser $wife): self
    {
        $this->wife = $wife;

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

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getTemoin(): ?PublicUser
    {
        return $this->temoin;
    }

    public function setTemoin(?PublicUser $temoin): self
    {
        $this->temoin = $temoin;

        return $this;
    }

    public function getMariageDate(): ?\DateTimeInterface
    {
        return $this->mariageDate;
    }

    public function setMariageDate(\DateTimeInterface $mariageDate): self
    {
        $this->mariageDate = $mariageDate;

        return $this;
    }
}
