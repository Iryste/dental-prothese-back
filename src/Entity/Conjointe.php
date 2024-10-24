<?php

namespace App\Entity;

use App\Repository\ConjointesRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;

#[ORM\Entity(repositoryClass: ConjointesRepository::class)]
#[ApiResource]
class Conjointe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Title = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\ManyToOne(targetEntity: Materiau::class, fetch: 'EAGER')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Materiau $materiau = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): static
    {
        $this->Title = $Title;

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

    public function getMateriau(): ?Materiau
    {
        return $this->materiau;
    }


    public function setMateriau(?Materiau $materiau): static
    {
        $this->materiau = $materiau;

        return $this;
    }
}
