<?php

namespace App\Entity;

use App\Repository\ClimatsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClimatsRepository::class)]
class Climats
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Climat = null;

    #[ORM\OneToMany(mappedBy: 'Climat', targetEntity: Peche::class)]
    private Collection $peches;

    public function __construct()
    {
        $this->peches = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClimat(): ?string
    {
        return $this->Climat;
    }

    public function setClimat(string $Climat): self
    {
        $this->Climat = $Climat;

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
            $pech->setClimat($this);
        }

        return $this;
    }

    public function removePech(Peche $pech): self
    {
        if ($this->peches->removeElement($pech)) {
            // set the owning side to null (unless already changed)
            if ($pech->getClimat() === $this) {
                $pech->setClimat(null);
            }
        }

        return $this;
    }
}