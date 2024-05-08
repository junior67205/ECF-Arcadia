<?php

namespace App\Entity;

use App\Repository\AnimalsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnimalsRepository::class)]
class Animals
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 70)]
    private ?string $name = null;

    #[ORM\Column(length: 30)]
    private ?string $state = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 6, scale: 2)]
    private ?string $weight = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2)]
    private ?string $size = null;

    #[ORM\Column(length: 25)]
    private ?string $gender = null;

    #[ORM\Column(length: 100)]
    private ?string $age = null;

    /**
     * @var Collection<int, PictureAnimals>
     */
    #[ORM\OneToMany(targetEntity: PictureAnimals::class, mappedBy: 'animals', cascade: ['persist'])]
    private Collection $pictureAnimals;

    /**
     * @var Collection<int, FoodAnimal>
     */
    #[ORM\OneToMany(targetEntity: FoodAnimal::class, mappedBy: 'animals')]
    private Collection $foodAnimal;

    #[ORM\ManyToOne(inversedBy: 'habitat')]
    private ?Habitats $habitats = null;

    #[ORM\ManyToOne(inversedBy: 'race')]
    private ?Race $race = null;

    /**
     * @var Collection<int, Report>
     */
    #[ORM\OneToMany(targetEntity: Report::class, mappedBy: 'animals')]
    private Collection $report;

    public function __construct()
    {
        $this->pictureAnimals = new ArrayCollection();
        $this->foodAnimal = new ArrayCollection();
        $this->report = new ArrayCollection();
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

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state): static
    {
        $this->state = $state;

        return $this;
    }

    public function getWeight(): ?string
    {
        return $this->weight;
    }

    public function setWeight(string $weight): static
    {
        $this->weight = $weight;

        return $this;
    }

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function setSize(string $size): static
    {
        $this->size = $size;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): static
    {
        $this->gender = $gender;

        return $this;
    }

    public function getAge(): ?string
    {
        return $this->age;
    }

    public function setAge(string $age): static
    {
        $this->age = $age;

        return $this;
    }

    /**
     * @return Collection<int, PictureAnimals>
     */
    public function getPictureAnimals(): Collection
    {
        return $this->pictureAnimals;
    }

    public function addPictureAnimal(PictureAnimals $pictureAnimal): static
    {
        if (!$this->pictureAnimals->contains($pictureAnimal)) {
            $this->pictureAnimals->add($pictureAnimal);
            $pictureAnimal->setAnimals($this);
        }

        return $this;
    }

    public function removePictureAnimal(PictureAnimals $pictureAnimal): static
    {
        if ($this->pictureAnimals->removeElement($pictureAnimal)) {
            // set the owning side to null (unless already changed)
            if ($pictureAnimal->getAnimals() === $this) {
                $pictureAnimal->setAnimals(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, FoodAnimal>
     */
    public function getFoodAnimal(): Collection
    {
        return $this->foodAnimal;
    }

    public function addFoodAnimal(FoodAnimal $foodAnimal): static
    {
        if (!$this->foodAnimal->contains($foodAnimal)) {
            $this->foodAnimal->add($foodAnimal);
            $foodAnimal->setAnimals($this);
        }

        return $this;
    }

    public function removeFoodAnimal(FoodAnimal $foodAnimal): static
    {
        if ($this->foodAnimal->removeElement($foodAnimal)) {
            // set the owning side to null (unless already changed)
            if ($foodAnimal->getAnimals() === $this) {
                $foodAnimal->setAnimals(null);
            }
        }

        return $this;
    }

    public function getHabitats(): ?Habitats
    {
        return $this->habitats;
    }

    public function setHabitats(?Habitats $habitats): static
    {
        $this->habitats = $habitats;

        return $this;
    }

    public function getRace(): ?Race
    {
        return $this->race;
    }

    public function setRace(?Race $race): static
    {
        $this->race = $race;

        return $this;
    }

    /**
     * @return Collection<int, Report>
     */
    public function getReport(): Collection
    {
        return $this->report;
    }

    public function addReport(Report $report): static
    {
        if (!$this->report->contains($report)) {
            $this->report->add($report);
            $report->setAnimals($this);
        }

        return $this;
    }

    public function removeReport(Report $report): static
    {
        if ($this->report->removeElement($report)) {
            // set the owning side to null (unless already changed)
            if ($report->getAnimals() === $this) {
                $report->setAnimals(null);
            }
        }

        return $this;
    }
}
