<?php

namespace App\Entity;

use App\Repository\PecheRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PecheRepository::class)]
class Peche
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'peches')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Poissons $Poisson = null;

    #[ORM\ManyToOne(inversedBy: 'peches')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Pecheurs $Pecheur = null;

    #[ORM\ManyToOne(inversedBy: 'peches')]
    private ?Climats $Climat = null;

    #[ORM\Column(nullable: true)]
    private ?int $Temperature = null;

    #[ORM\ManyToOne(inversedBy: 'peches')]
    #[ORM\JoinColumn(nullable: false)]
    private ?SessionPeche $SessionPeche = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Photo = null;

    #[ORM\Column(nullable: true)]
    private ?float $Taille = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $Heure = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updated_at = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPoisson(): ?Poissons
    {
        return $this->Poisson;
    }

    public function setPoisson(?Poissons $Poisson): self
    {
        $this->Poisson = $Poisson;

        return $this;
    }

    public function getPecheur(): ?Pecheurs
    {
        return $this->Pecheur;
    }

    public function setPecheur(?Pecheurs $Pecheur): self
    {
        $this->Pecheur = $Pecheur;

        return $this;
    }

    public function getClimat(): ?Climats
    {
        return $this->Climat;
    }

    public function setClimat(?Climats $Climat): self
    {
        $this->Climat = $Climat;

        return $this;
    }

    public function getTemperature(): ?int
    {
        return $this->Temperature;
    }

    public function setTemperature(?int $Temperature): self
    {
        $this->Temperature = $Temperature;

        return $this;
    }

    public function getSessionPeche(): ?SessionPeche
    {
        return $this->SessionPeche;
    }

    public function setSessionPeche(?SessionPeche $SessionPeche): self
    {
        $this->SessionPeche = $SessionPeche;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->Photo;
    }

    public function setPhoto(?string $Photo): self
    {
        $this->Photo = $Photo;

        return $this;
    }

    public function getTaille(): ?float
    {
        return $this->Taille;
    }

    public function setTaille(?float $Taille): self
    {
        $this->Taille = $Taille;

        return $this;
    }

    public function getHeure(): ?\DateTimeInterface
    {
        return $this->Heure;
    }

    public function setHeure(?\DateTimeInterface $Heure): self
    {
        $this->Heure = $Heure;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeImmutable $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }
}
