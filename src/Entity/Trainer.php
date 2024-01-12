<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\TrainerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TrainerRepository::class)]
#[ApiResource]
class Trainer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'idTrainer', targetEntity: PcBox::class)]
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
            $pcBox->setIdTrainer($this);
        }

        return $this;
    }

    public function removePcBox(PcBox $pcBox): static
    {
        if ($this->pcBoxes->removeElement($pcBox)) {
            // set the owning side to null (unless already changed)
            if ($pcBox->getIdTrainer() === $this) {
                $pcBox->setIdTrainer(null);
            }
        }

        return $this;
    }
}
