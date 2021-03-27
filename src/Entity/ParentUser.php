<?php

namespace App\Entity;

use App\Repository\ParentUserRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ParentUserRepository::class)
 */
class ParentUser
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
    private $LastName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $FirstName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Occupation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Address;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Gender;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastName(): ?string
    {
        return $this->LastName;
    }

    public function setLastName(string $LastName): self
    {
        $this->LastName = $LastName;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->FirstName;
    }

    public function setFirstName(string $FirstName): self
    {
        $this->FirstName = $FirstName;

        return $this;
    }

    public function getOccupation(): ?string
    {
        return $this->Occupation;
    }

    public function setOccupation(string $Occupation): self
    {
        $this->Occupation = $Occupation;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->Address;
    }

    public function setAddress(string $Address): self
    {
        $this->Address = $Address;

        return $this;
    }

    public function getGender(): ?bool
    {
        return $this->Gender;
    }

    public function setGender(bool $Gender): self
    {
        $this->Gender = $Gender;

        return $this;
    }
}
