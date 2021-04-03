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
    private $declarationDate;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\PublicUser")
     */
    private $husband;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\PublicUser")
     */
    private $wife;

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
}
