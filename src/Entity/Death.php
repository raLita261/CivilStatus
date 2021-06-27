<?php

namespace App\Entity;

use App\Repository\DeathRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DeathRepository::class)
 */
class Death
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
    private $deathDate;


    /**
     * @ORM\Column(type="date")
     */
    private $declarationDate;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\PublicUser")
     */
    private $maty;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\PublicUser")
     */
    private $vadiny;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\PublicUser")
     */
    private $temoin;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $payment;


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
    private $status;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDeathDate(): ?\DateTimeInterface
    {
        return $this->deathDate;
    }

    public function setDeathDate(\DateTimeInterface $deathDate): self
    {
        $this->deathDate = $deathDate;

        return $this;
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

    public function getPayment(): ?string
    {
        return $this->payment;
    }

    public function setPayment(?string $payment): self
    {
        $this->payment = $payment;

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

    public function getVadiny(): ?PublicUser
    {
        return $this->vadiny;
    }

    public function setVadiny(?PublicUser $vadiny): self
    {
        $this->vadiny = $vadiny;

        return $this;
    }


    public function setMother(?PublicUser $mother): self
    {
        $this->mother = $mother;

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

    public function getMaty(): ?PublicUser
    {
        return $this->maty;
    }

    public function setMaty(?PublicUser $maty): self
    {
        $this->maty = $maty;

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
