<?php

namespace App\Entity;

use App\Repository\RacaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RacaRepository::class)]
class Raca
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 200)]
    private ?string $Nome = null;

    #[ORM\Column(length: 200)]
    private ?string $Porte = null;

    #[ORM\OneToMany(mappedBy: 'raca', targetEntity: Animal::class)]
    private Collection $animals;

    public function __construct()
    {
        $this->animals = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): ?string
    {
        return $this->Nome;
    }

    public function setNome(string $Nome): static
    {
        $this->Nome = $Nome;

        return $this;
    }

    public function getPorte(): ?string
    {
        return $this->Porte;
    }

    public function setPorte(string $Porte): static
    {
        $this->Porte = $Porte;

        return $this;
    }

    public function __toString(): string
    {
        return $this->nome ?? '';
    }

    public function getAnimals(): Collection
    {
        return $this->animals;
    }

    public function addAnimal(Animal $animal) : self
    {
        if (!$this->animals->contains($animal))
        {
            $this->animals->add($animal);
            $animal->setRaca($this);
        }

        return $this;
    }

    public function removeAnimal(Animal $animal) : self
    {
        if ($this->animals->removeElement($animal))
        {
            if ($animal->getRaca() === $this)
            { $animal->setRaca(null);}
        }

        return $this;
    }
}
