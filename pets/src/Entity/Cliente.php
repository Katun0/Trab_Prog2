<?php

namespace App\Entity;

use App\Repository\ClienteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
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

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $endereco = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $bairro = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $cep = null;

    #[ORM\Column(length: 40, nullable: true)]
    private ?string $numero = null;

    #[ORM\ManyToOne(targetEntity: Cidade::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Cidade $cidade = null;

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

    public function getEndereco(): ?string
    {
        return $this->endereco;
    }

    public function setEndereco(?string $endereco): static
    {
        $this->endereco = $endereco;

        return $this;
    }

    public function getBairro(): ?string
    {
        return $this->bairro;
    }

    public function setBairro(?string $bairro): static
    {
        $this->bairro = $bairro;

        return $this;
    }

    public function getCep(): ?string
    {
        return $this->cep;
    }

    public function setCep(?string $cep): static
    {
        $this->cep = $cep;

        return $this;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(?string $numero): static
    {
        $this->numero = $numero;

        return $this;
    }

}
