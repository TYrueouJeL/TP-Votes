<?php

namespace App\Entity;

use App\Repository\LawRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LawRepository::class)]
class Law
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Title = null;

    #[ORM\Column(length: 255)]
    private ?string $Content = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $PublishDate = null;

    /**
     * @var Collection<int, Comment>
     */
    #[ORM\OneToMany(targetEntity: Comment::class, mappedBy: 'Law', orphanRemoval: true)]
    private Collection $comments;

    /**
     * @var Collection<int, Domain>
     */
    #[ORM\ManyToMany(targetEntity: Domain::class, inversedBy: 'laws')]
    private Collection $Domain;

    /**
     * @var Collection<int, Vote>
     */
    #[ORM\OneToMany(targetEntity: Vote::class, mappedBy: 'Law', orphanRemoval: true)]
    private Collection $votes;

    public function __construct()
    {
        $this->votes = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->Domain = new ArrayCollection();
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

    public function getContent(): ?string
    {
        return $this->Content;
    }

    public function setContent(string $Content): static
    {
        $this->Content = $Content;

        return $this;
    }

    public function getPublishDate(): ?\DateTimeInterface
    {
        return $this->PublishDate;
    }

    public function setPublishDate(\DateTimeInterface $PublishDate): static
    {
        $this->PublishDate = $PublishDate;

        return $this;
    }

    /**
     * @return Collection<int, Comment>
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): static
    {
        if (!$this->comments->contains($comment)) {
            $this->comments->add($comment);
            $comment->setLaw($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): static
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getLaw() === $this) {
                $comment->setLaw(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Domain>
     */
    public function getDomain(): Collection
    {
        return $this->Domain;
    }

    public function addDomain(Domain $domain): static
    {
        if (!$this->Domain->contains($domain)) {
            $this->Domain->add($domain);
        }

        return $this;
    }

    public function removeDomain(Domain $domain): static
    {
        $this->Domain->removeElement($domain);

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
            $vote->setLaw($this);
        }

        return $this;
    }

    public function removeVote(Vote $vote): static
    {
        if ($this->votes->removeElement($vote)) {
            // set the owning side to null (unless already changed)
            if ($vote->getLaw() === $this) {
                $vote->setLaw(null);
            }
        }

        return $this;
    }
}
