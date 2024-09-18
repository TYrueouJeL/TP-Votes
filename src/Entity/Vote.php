<?php

namespace App\Entity;

use App\Repository\VoteRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VoteRepository::class)]
class Vote
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $VoteDate = null;

    #[ORM\ManyToOne(inversedBy: 'votes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $User = null;

    #[ORM\Column]
    private ?bool $Value = null;

    #[ORM\ManyToOne(inversedBy: 'votes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Law $Law = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVoteDate(): ?\DateTimeInterface
    {
        return $this->VoteDate;
    }

    public function setVoteDate(\DateTimeInterface $VoteDate): static
    {
        $this->VoteDate = $VoteDate;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): static
    {
        $this->User = $User;

        return $this;
    }

    public function isValue(): ?bool
    {
        return $this->Value;
    }

    public function setValue(bool $Value): static
    {
        $this->Value = $Value;

        return $this;
    }

    public function getLaw(): ?Law
    {
        return $this->Law;
    }

    public function setLaw(?Law $Law): static
    {
        $this->Law = $Law;

        return $this;
    }
}
