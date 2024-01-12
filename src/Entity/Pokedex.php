<?php

namespace App\Entity;

use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiResource;
use App\Repository\PokedexRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PokedexRepository::class)]
#[ApiResource]
#[ApiFilter(SearchFilter::class, properties: ['region.id' => 'exact', 'type.id' => 'exact'])]
class Pokedex
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $idPokedex = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $spritePath = null;

    #[ORM\ManyToOne(inversedBy: 'pokedex')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Type $type = null;

    #[ORM\ManyToOne(inversedBy: 'pokedex')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Region $region = null;

    #[ORM\OneToMany(mappedBy: 'idPokedex', targetEntity: PcBox::class)]
    private Collection $pcBoxes;

    public function __construct()
    {
        $this->pcBoxes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getIdPokedex(): ?int
    {
        return $this->idPokedex;
    }

    public function setIdPokedex(int $idPokedex): static
    {
        $this->idPokedex = $idPokedex;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getSpritePath(): ?string
    {
        return $this->spritePath;
    }

    public function setSpritePath(?string $spritePath): static
    {
        $this->spritePath = $spritePath;

        return $this;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getRegion(): ?Region
    {
        return $this->region;
    }

    public function setRegion(?Region $region): static
    {
        $this->region = $region;

        return $this;
    }

    /**
     * @return Collection<int, PcBox>
     */
    public function getPcBoxes(): Collection
    {
        return $this->pcBoxes;
    }

    public function addPcBox(PcBox $pcBox): static
    {
        if (!$this->pcBoxes->contains($pcBox)) {
            $this->pcBoxes->add($pcBox);
            $pcBox->setIdPokedex($this);
        }

        return $this;
    }

    public function removePcBox(PcBox $pcBox): static
    {
        if ($this->pcBoxes->removeElement($pcBox)) {
            // set the owning side to null (unless already changed)
            if ($pcBox->getIdPokedex() === $this) {
                $pcBox->setIdPokedex(null);
            }
        }

        return $this;
    }
}
