<?php

namespace App\Entity;

use App\Repository\LieuxRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

#[ORM\Entity(repositoryClass: LieuxRepository::class)]
class Lieux
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Commune = null;

    #[ORM\Column(length: 255)]
    private ?string $CP = null;

    #[ORM\Column]
    #[Gedmo\Timestampable(on:"create")]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column]
    #[Gedmo\Timestampable(on:"update")]
    private ?\DateTimeImmutable $updated_at = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommune(): ?string
    {
        return $this->Commune;
    }

    public function setCommune(string $Commune): self
    {
        $this->Commune = $Commune;

        return $this;
    }

    public function getCP(): ?string
    {
        return $this->CP;
    }

    public function setCP(string $CP): self
    {
        $this->CP = $CP;

        return $this;
    }

    public function __toString()
    {
        return $this->getCommune();
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
