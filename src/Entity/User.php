<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Firstname = null;

    #[ORM\Column(length: 255)]
    private ?string $Lastname = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $Birthdate = null;

    /**
     * @var Collection<int, Law>
     */
    #[ORM\ManyToMany(targetEntity: Law::class)]
    private Collection $Law;

    /**
     * @var Collection<int, Vote>
     */
    #[ORM\OneToMany(targetEntity: Vote::class, mappedBy: 'User')]
    private Collection $votes;

    public function __construct()
    {
        $this->Law = new ArrayCollection();
        $this->votes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->Firstname;
    }

    public function setFirstname(string $Firstname): static
    {
        $this->Firstname = $Firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->Lastname;
    }

    public function setLastname(string $Lastname): static
    {
        $this->Lastname = $Lastname;

        return $this;
    }

    public function getBirthdate(): ?\DateTimeInterface
    {
        return $this->Birthdate;
    }

    public function setBirthdate(\DateTimeInterface $Birthdate): static
    {
        $this->Birthdate = $Birthdate;

        return $this;
    }

    /**
     * @return Collection<int, Law>
     */
    public function getLaw(): Collection
    {
        return $this->Law;
    }

    public function addLaw(Law $law): static
    {
        if (!$this->Law->contains($law)) {
            $this->Law->add($law);
        }

        return $this;
    }

    public function removeLaw(Law $law): static
    {
        $this->Law->removeElement($law);

        return $this;
    }

    /**
     * @return Collection<int, Vote>
     */
    public function getVotes(): Collection
    {
        return $this->votes;
    }

    public function addVote(Vote $vote): static
    {
        if (!$this->votes->contains($vote)) {
            $this->votes->add($vote);
            $vote->setUser($this);
        }

        return $this;
    }

    public function removeVote(Vote $vote): static
    {
        if ($this->votes->removeElement($vote)) {
            // set the owning side to null (unless already changed)
            if ($vote->getUser() === $this) {
                $vote->setUser(null);
            }
        }

        return $this;
    }
}
