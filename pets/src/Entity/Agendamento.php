<?php

namespace App\Entity;

use App\Repository\AgendamentoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AgendamentoRepository::class)]
class Agendamento
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

<<<<<<< HEAD
    #[ORM\ManyToOne(inversedBy: 'agendamentos')]
=======
    #[ORM\ManyToOne(inversedBy: 'data_agendamento')]
>>>>>>> 2d58c410fbb1caf7b679b3b0396c1aa5a5047edc
    private ?User $user = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $data_agendamento = null;

    #[ORM\ManyToOne(inversedBy: 'agendamentos')]
    private ?Servico $servico = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $descricao = null;

<<<<<<< HEAD
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $status = null;

=======
>>>>>>> 2d58c410fbb1caf7b679b3b0396c1aa5a5047edc
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getDataAgendamento(): ?\DateTimeInterface
    {
        return $this->data_agendamento;
    }

    public function setDataAgendamento(?\DateTimeInterface $data_agendamento): static
    {
        $this->data_agendamento = $data_agendamento;

        return $this;
    }

    public function getServico(): ?Servico
    {
        return $this->servico;
    }

    public function setServico(?servico $servico): static
    {
        $this->servico = $servico;

        return $this;
    }

    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    public function setDescricao(?string $descricao): static
    {
        $this->descricao = $descricao;

        return $this;
    }
<<<<<<< HEAD

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): static
    {
        $this->status = $status;

        return $this;
    }
=======
>>>>>>> 2d58c410fbb1caf7b679b3b0396c1aa5a5047edc
}
