<?php

namespace App\Entity;

use App\Repository\MusegroupeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MusegroupeRepository::class)]
class Musegroupe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $groupName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $origine = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $city = null;

    #[ORM\Column(nullable: true)]
    private ?int $startDate = null;

    #[ORM\Column(nullable: true)]
    private ?int $separateYear = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $fondator = null;

    #[ORM\Column(nullable: true)]
    private ?int $membres = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $genre = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $presentation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGroupName(): ?string
    {
        return $this->groupName;
    }

    public function setGroupName(?string $groupName): static
    {
        $this->groupName = $groupName;

        return $this;
    }

    public function getOrigine(): ?string
    {
        return $this->origine;
    }

    public function setOrigine(?string $origine): static
    {
        $this->origine = $origine;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): static
    {
        $this->city = $city;

        return $this;
    }

    public function getStartDate(): ?int
    {
        return $this->startDate;
    }

    public function setStartDate(?int $startDate): static
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getSeparateYear(): ?int
    {
        return $this->separateYear;
    }

    public function setSeparateYear(?int $separateYear): static
    {
        $this->separateYear = $separateYear;

        return $this;
    }

    public function getFondator(): ?string
    {
        return $this->fondator;
    }

    public function setFondator(?string $fondator): static
    {
        $this->fondator = $fondator;

        return $this;
    }

    public function getMembres(): ?int
    {
        return $this->membres;
    }

    public function setMembres(?int $membres): static
    {
        $this->membres = $membres;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(?string $genre): static
    {
        $this->genre = $genre;

        return $this;
    }

    public function getPresentation(): ?string
    {
        return $this->presentation;
    }

    public function setPresentation(?string $presentation): static
    {
        $this->presentation = $presentation;

        return $this;
    }
}
