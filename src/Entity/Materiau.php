<?php

namespace App\Entity;

use App\Repository\MateriauRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: MateriauRepository::class)]
#[ApiResource]
class Materiau
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['adjointe:read'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['adjointe:read'])]
    private ?string $title = null;

// Relation avec Adjointe
    #[ORM\OneToMany(mappedBy: 'materiau', targetEntity: Adjointe::class)]
    private Collection $adjointes;

// Relation avec Conjointe
    #[ORM\OneToMany(mappedBy: 'materiau', targetEntity: Conjointe::class)]
    private Collection $conjointes;

public function __construct()
{
    $this->adjointes = new ArrayCollection();
    $this->conjointes = new ArrayCollection();
}


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

    public function __toString(): string
    {
        return $this->title;
    }

// Getters/setters pour Adjointe
    public function getAdjointes(): Collection
    {
        return $this->adjointes;
    }

    public function addAdjointe(Adjointe $adjointe): static
    {
        if (!$this->adjointes->contains($adjointe)) {
            $this->adjointes[] = $adjointe;
            $adjointe->setMateriau($this); // Lien inverse
        }

        return $this;
    }

    public function removeAdjointe(Adjointe $adjointe): static
    {
        if ($this->adjointes->removeElement($adjointe)) {
            // Désassocier le matériau si l'adjointe le contient encore
            if ($adjointe->getMateriau() === $this) {
                $adjointe->setMateriau(null);
            }
        }

        return $this;
    }

// Getters et setters pour Conjointe
    public function getConjointes(): Collection
    {
        return $this->conjointes;
    }

    public function addConjointe(Conjointe $conjointe): static
    {
        if (!$this->conjointes->contains($conjointe)) {
            $this->conjointes[] = $conjointe;
            $conjointe->setMateriau($this); // Lien inverse
    }

    return $this;
    }

    public function removeConjointe(Conjointe $conjointe): static
    {
        if ($this->conjointes->removeElement($conjointe)) {
            // Désassocier le matériau si la conjointe le contient encore
            if ($conjointe->getMateriau() === $this) {
                $conjointe->setMateriau(null);
        }
    }

    return $this;
    }
}
