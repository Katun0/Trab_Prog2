<?php

namespace App\Entity;

use App\Repository\AnimalRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use PhpParser\Node\Scalar\Float_;

#[ORM\Entity(repositoryClass: AnimalRepository::class)]
class Animal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 200)]
    private ?string $Nome = null;

    #[ORM\Column(type: 'decimal', precision:10, scale: 2)]
    private ?float $Idade = null;

    #[ORM\ManyToOne(targetEntity: Raca::class, inversedBy: 'animals')]
    #[ORM\JoinColumn(nullable:false, onDelete: 'CASCADE')]
    private ?Raca $raca = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private ?string $foto = null;

    #[ORM\ManyToOne(targetEntity: AnimalTipo::class, inversedBy: 'animals')]
    #[ORM\JoinColumn(nullable: false)]
    private ?AnimalTipo $Tipo = null;

    

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

    public function getIdade(): ?float
    {
        return $this->Idade;
    }

    public function setIdade(float $Idade): static
    {
        $this->Idade = $Idade;

        return $this;
    }

    public function getRaca(): ?Raca
    {
        return $this->raca;
    }

    public function setRaca(?Raca $raca): self
    {
        $this->raca = $raca;

        return $this;
    }

    public function getFoto() : ?string
    {
        return $this->foto;
    }

    public function setFoto(?string $foto) : self
    {
        $this->foto = $foto;

        return $this;
    }

    public function getTipo(): ?AnimalTipo
    {
        return $this->Tipo;
    }

    public function setTipo(?AnimalTipo $Tipo): static
    {
        $this->Tipo = $Tipo;

        return $this;
    }
}
