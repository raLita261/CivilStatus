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
     * @ORM\Column(type="date")
     */
    private $declarationDate;


    /**
     * @ORM\OneToOne(targetEntity="App\Entity\PublicUser")
     */
    private $publicUser;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\OfficeLocation")
     */
    private $officeLocation;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User")
     */
    private $officier;

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

    public function getPublicUser(): ?PublicUser
    {
        return $this->publicUser;
    }

    public function setPublicUser(?PublicUser $publicUser): self
    {
        $this->publicUser = $publicUser;

        return $this;
    }

    public function getOfficeLocation(): ?OfficeLocation
    {
        return $this->officeLocation;
    }

    public function setOfficeLocation(?OfficeLocation $officeLocation): self
    {
        $this->officeLocation = $officeLocation;

        return $this;
    }

    public function getOfficier(): ?User
    {
        return $this->officier;
    }

    public function setOfficier(?User $officier): self
    {
        $this->officier = $officier;

        return $this;
    }
}
