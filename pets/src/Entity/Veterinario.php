<?php

namespace App\Entity;

use App\Repository\VeterinarioRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VeterinarioRepository::class)]
class Veterinario
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 200)]
    private ?string $Nome = null;

    #[ORM\Column(length: 200)]
    private ?string $sobrenome = null;

    #[ORM\Column(length: 11, unique:true)]
    private ?string $cpf = null;

    #[ORM\Column(length: 10, unique:true)]
    private ?string $CRMV = null;

    #[ORM\Column(length: 20)]
    private ?string $contato = null;

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

    public function getSobrenome(): ?string
    {
        return $this->sobrenome;
    }

    public function setSobrenome(string $sobrenome): static
    {
        $this->sobrenome = $sobrenome;

        return $this;
    }

    public function getCpf(): ?string
    {
        return $this->cpf;
    }

    public function setCpf(string $cpf): static
    {
        $this->cpf = $cpf;

        return $this;
    }

    public function getCRMV(): ?string
    {
        return $this->CRMV;
    }

    public function setCRMV(string $CRMV): static
    {
        $this->CRMV = $CRMV;

        return $this;
    }

    public function getContato(): ?string
    {
        return $this->contato;
    }

    public function setContato(string $contato): static
    {
        $this->contato = $contato;

        return $this;
    }
}
