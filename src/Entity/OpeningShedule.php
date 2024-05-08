<?php

namespace App\Entity;

use App\Repository\OpeningSheduleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OpeningSheduleRepository::class)]
class OpeningShedule
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 32)]
    private ?string $days = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $hoursOpen = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $hoursClose = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDays(): ?string
    {
        return $this->days;
    }

    public function setDays(?string $days): static
    {
        $this->days = $days;

        return $this;
    }

    public function getHoursOpen(): ?\DateTimeInterface
    {
        return $this->hoursOpen;
    }

    public function setHoursOpen(?\DateTimeInterface $hoursOpen): static
    {
        $this->hoursOpen = $hoursOpen;

        return $this;
    }

    public function getHoursClose(): ?\DateTimeInterface
    {
        return $this->hoursClose;
    }

    public function setHoursClose(?\DateTimeInterface $hoursClose): static
    {
        $this->hoursClose = $hoursClose;

        return $this;
    }
}
