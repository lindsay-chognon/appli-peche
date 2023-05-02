<?php

namespace App\Entity;

use App\Repository\PoissonsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PoissonsRepository::class)]
class Poissons
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Poisson = null;

    #[ORM\OneToMany(mappedBy: 'Poisson', targetEntity: Peche::class)]
    private Collection $peches;

    public function __construct()
    {
        $this->peches = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPoisson(): ?string
    {
        return $this->Poisson;
    }

    public function setPoisson(string $Poisson): self
    {
        $this->Poisson = $Poisson;

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
            $pech->setPoisson($this);
        }

        return $this;
    }

    public function removePech(Peche $pech): self
    {
        if ($this->peches->removeElement($pech)) {
            // set the owning side to null (unless already changed)
            if ($pech->getPoisson() === $this) {
                $pech->setPoisson(null);
            }
        }

        return $this;
    }
}
