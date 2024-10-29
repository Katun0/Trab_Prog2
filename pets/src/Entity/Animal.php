<?php

namespace App\Entity;

use App\Repository\AnimalRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnimalRepository::class)]
class Animal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 200)]
    private ?string $Nome = null;

    #[ORM\Column]
    private ?int $Idade = null;

    #[ORM\Column(length: 200)]
    private ?string $raca = null;

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

    public function getIdade(): ?int
    {
        return $this->Idade;
    }

    public function setIdade(int $Idade): static
    {
        $this->Idade = $Idade;

        return $this;
    }

    public function getRaca(): ?string
    {
        return $this->raca;
    }

    public function setRaca(string $raca): static
    {
        $this->raca = $raca;

        return $this;
    }
}
