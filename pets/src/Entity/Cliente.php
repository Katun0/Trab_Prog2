<?php

namespace App\Entity;

use App\Repository\ClienteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClienteRepository::class)]
class Cliente
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 200)]
    private ?string $Nome = null;

    #[ORM\Column(length: 20)]
    private ?string $CPF_CNPJ = null;

    #[ORM\Column(length: 15)]
    private ?string $Contato = null;

    #[ORM\Column(length: 200, nullable: true)]
    private ?string $email = null;

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

    public function getCPFCNPJ(): ?string
    {
        return $this->CPF_CNPJ;
    }

    public function setCPFCNPJ(string $CPF_CNPJ): static
    {
        $this->CPF_CNPJ = $CPF_CNPJ;

        return $this;
    }

    public function getContato(): ?string
    {
        return $this->Contato;
    }

    public function setContato(string $Contato): static
    {
        $this->Contato = $Contato;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;

        return $this;
    }
}
