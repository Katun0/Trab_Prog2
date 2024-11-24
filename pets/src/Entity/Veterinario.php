<?php

namespace App\Entity;

use App\Repository\VeterinarioRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VeterinarioRepository::class)]
class Veterinario extends User
{
    #[ORM\Column(length: 11, unique:true)]
    private ?string $cpf = null;

    #[ORM\Column(length: 10, unique:true)]
    private ?string $CRMV = null;

    #[ORM\Column(length: 20)]
    private ?string $contato = null;

<<<<<<< HEAD
    #[ORM\OneToOne(inversedBy: 'veterinario', targetEntity: User::class, cascade: ['persist', 'remove'])]
=======
    #[ORM\OneToOne(inversedBy: 'veterinario', targetEntity: User::class)]
>>>>>>> 2d58c410fbb1caf7b679b3b0396c1aa5a5047edc
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

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

    public function setUser(?User $user): ?User
    {
        $this->user = $user;

        return $this;
    }

    public function getUser(?User $user): ?User
    {
        return $this->user;
    }
}
