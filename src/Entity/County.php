<?php

namespace App\Entity;

use App\Repository\CountyRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;

#[ORM\Entity(repositoryClass: CountyRepository::class)]
#[ApiResource]
class County
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 10)]
    private ?string $fipsCode = null;

    #[ORM\Column]
    private ?int $stateId = null;

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

    public function getFipsCode(): ?string
    {
        return $this->fipsCode;
    }

    public function setFipsCode(string $fipsCode): static
    {
        $this->fipsCode = $fipsCode;

        return $this;
    }

    public function getStateId(): ?int
    {
        return $this->stateId;
    }

    public function setStateId(int $stateId): static
    {
        $this->stateId = $stateId;

        return $this;
    }
}
