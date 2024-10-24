<?php

namespace App\Entity;

use App\Repository\AdjointesRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: AdjointesRepository::class)]
#[ApiResource]
class Adjointe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['adjointe:read'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['adjointe:read'])]
    private ?string $title = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['adjointe:read'])]
    private ?string $description = null;

    #[ORM\ManyToOne(targetEntity: Materiau::class, fetch: 'EAGER')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['adjointe:read'])]
    private ?Materiau $materiau = null;

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
