<?php

namespace App\Entity;

use App\Repository\AdjointesRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;

#[ORM\Entity(repositoryClass: AdjointesRepository::class)]
#[ApiResource]
class Adjointe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $prix = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prix2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prix3 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getPrix2(): ?string
    {
        return $this->prix2;
    }

    public function setPrix2(?string $prix2): static
    {
        $this->prix2 = $prix2;

        return $this;
    }

    public function getPrix3(): ?string
    {
        return $this->prix3;
    }

    public function setPrix3(?string $prix3): static
    {
        $this->prix3 = $prix3;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }
}
