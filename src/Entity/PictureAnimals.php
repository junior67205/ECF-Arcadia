<?php

namespace App\Entity;

use App\Repository\PictureAnimalsRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: PictureAnimalsRepository::class)]
#[Vich\Uploadable]
class PictureAnimals
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Vich\UploadableField(mapping: 'animaux', fileNameProperty: 'name', size: 'size')]
    private ?File $File = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(nullable: true)]
    private ?int $size = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updateAt = null;

    #[ORM\ManyToOne(inversedBy: 'pictureAnimals')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Animals $animals = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function __toString()
    {
        return $this->name;
    }

    public function setFile(?File $File): static
    {
        $this->File = $File;

        if (null !== $File) {
            $this->updateAt = new \DateTimeImmutable();
        }

        return $this;
    }

    public function getFile(): ?File
    {
        return $this->File;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getSize(): ?int
    {
        return $this->size;
    }

    public function setSize(?int $size): static
    {
        $this->size = $size;

        return $this;
    }

    public function getUpdateAt(): ?\DateTimeImmutable
    {
        return $this->updateAt;
    }

    public function setUpdateAt(?\DateTimeImmutable $updateAt): static
    {
        $this->updateAt = $updateAt;

        return $this;
    }

    public function getAnimals(): ?Animals
    {
        return $this->animals;
    }

    public function setAnimals(?Animals $animals): static
    {
        $this->animals = $animals;

        return $this;
    }
}
