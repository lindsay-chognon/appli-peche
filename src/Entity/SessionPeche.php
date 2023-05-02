<?php

namespace App\Entity;

use App\Repository\SessionPecheRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SessionPecheRepository::class)]
class SessionPeche
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Lieux $Lieu = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $Date = null;

    #[ORM\OneToMany(mappedBy: 'SessionPeche', targetEntity: Peche::class)]
    private Collection $peches;

    public function __construct()
    {
        $this->peches = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLieu(): ?Lieux
    {
        return $this->Lieu;
    }

    public function setLieu(?Lieux $Lieu): self
    {
        $this->Lieu = $Lieu;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(\DateTimeInterface $Date): self
    {
        $this->Date = $Date;

        return $this;
    }

    /**
     * @return Collection<int, Peche>
     */
    public function getPeches(): Collection
    {
        return $this->peches;
    }

    public function addPech(Peche $pech): self
    {
        if (!$this->peches->contains($pech)) {
            $this->peches->add($pech);
            $pech->setSessionPeche($this);
        }

        return $this;
    }

    public function removePech(Peche $pech): self
    {
        if ($this->peches->removeElement($pech)) {
            // set the owning side to null (unless already changed)
            if ($pech->getSessionPeche() === $this) {
                $pech->setSessionPeche(null);
            }
        }

        return $this;
    }
}
