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
    private ?string $nome = null;

    #[ORM\Column(length: 20)]
    private ?string $cpf_cnpj = null;

    #[ORM\Column(length: 15)]
    private ?string $contato = null;

    #[ORM\Column(length: 200, nullable: true)]
    private ?string $email = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getnome(): ?string
    {
        return $this->nome;
    }

    public function setnome(string $nome): static
    {
        $this->nome = $nome;

        return $this;
    }

    public function getCPFCNPJ(): ?string
    {
        return $this->cpf_cnpj;
    }

    public function setCPFCNPJ(string $cpf_cnpj): static
    {
        $this->cpf_cnpj = $cpf_cnpj;

        return $this;
    }

    public function getcontato(): ?string
    {
        return $this->contato;
    }

    public function setcontato(string $contato): static
    {
        $this->contato = $contato;

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
