<?php

namespace App\Entity;

use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiResource;
use App\Repository\PcBoxRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PcBoxRepository::class)]
#[ApiResource]
#[ApiFilter(SearchFilter::class, properties: ['idTrainer.id' => 'exact', 'idPokedex.id' => 'exact', 'captured' => 'exact'])]
class PcBox
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $level = null;

    #[ORM\Column]
    private ?bool $captured = null;

    #[ORM\ManyToOne(inversedBy: 'pcBoxes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Pokedex $idPokedex = null;

    #[ORM\ManyToOne(inversedBy: 'pcBoxes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Trainer $idTrainer = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(int $level): static
    {
        $this->level = $level;

        return $this;
    }

    public function isCaptured(): ?bool
    {
        return $this->captured;
    }

    public function setCaptured(bool $captured): static
    {
        $this->captured = $captured;

        return $this;
    }

    public function getIdPokedex(): ?Pokedex
    {
        return $this->idPokedex;
    }

    public function setIdPokedex(?Pokedex $idPokedex): static
    {
        $this->idPokedex = $idPokedex;

        return $this;
    }

    public function getIdTrainer(): ?Trainer
    {
        return $this->idTrainer;
    }

    public function setIdTrainer(?Trainer $idTrainer): static
    {
        $this->idTrainer = $idTrainer;

        return $this;
    }
}
