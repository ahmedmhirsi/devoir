<?php

namespace App\Entity;

use App\Repository\BatimentRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BatimentRepository::class)]
class Batiment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nom = null;

    #[ORM\Column(nullable: true)]
    private ?int $nbetage = null;

    #[ORM\Column(nullable: true)]
    private ?bool $available = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTime $dateconstruction = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getNbetage(): ?int
    {
        return $this->nbetage;
    }

    public function setNbetage(?int $nbetage): static
    {
        $this->nbetage = $nbetage;

        return $this;
    }

    public function isAvailable(): ?bool
    {
        return $this->available;
    }

    public function setAvailable(?bool $available): static
    {
        $this->available = $available;

        return $this;
    }

    public function getDateconstruction(): ?\DateTime
    {
        return $this->dateconstruction;
    }

    public function setDateconstruction(?\DateTime $dateconstruction): static
    {
        $this->dateconstruction = $dateconstruction;

        return $this;
    }
}
