<?php

namespace App\Entity;

use App\Repository\DomainRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DomainRepository::class)]
class Domain
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Title = null;

    #[ORM\Column(length: 255)]
    private ?string $Description = null;

    /**
     * @var Collection<int, Law>
     */
    #[ORM\ManyToMany(targetEntity: Law::class, mappedBy: 'Domain')]
    private Collection $laws;

    public function __construct()
    {
        $this->laws = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): static
    {
        $this->Title = $Title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): static
    {
        $this->Description = $Description;

        return $this;
    }

    /**
     * @return Collection<int, Law>
     */
    public function getLaws(): Collection
    {
        return $this->laws;
    }

    public function addLaw(Law $law): static
    {
        if (!$this->laws->contains($law)) {
            $this->laws->add($law);
            $law->addDomain($this);
        }

        return $this;
    }

    public function removeLaw(Law $law): static
    {
        if ($this->laws->removeElement($law)) {
            $law->removeDomain($this);
        }

        return $this;
    }
}
