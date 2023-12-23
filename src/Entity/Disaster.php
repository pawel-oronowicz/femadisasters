<?php

namespace App\Entity;

use App\Repository\DisasterRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;

#[ORM\Entity(repositoryClass: DisasterRepository::class)]
#[ApiResource]
class Disaster
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $femaDeclarationString = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $disasterNumber = null;

    #[ORM\Column]
    private ?int $stateId = null;

    #[ORM\Column]
    private ?int $countyId = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $declarationType = null;

    #[ORM\Column(type: Types::DATETIMETZ_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $declarationDate = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $fiscalYearDeclared = null;

    #[ORM\Column]
    private ?int $incidentTypeId = null;

    #[ORM\Column(length: 255)]
    private ?string $declarationTitle = null;

    #[ORM\Column(nullable: true)]
    private ?bool $ihProgramDeclared = null;

    #[ORM\Column(nullable: true)]
    private ?bool $iaProgramDeclared = null;

    #[ORM\Column(nullable: true)]
    private ?bool $paProgramDeclared = null;

    #[ORM\Column(nullable: true)]
    private ?bool $hmProgramDeclared = null;

    #[ORM\Column(type: Types::DATETIMETZ_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $incidentBeginDate = null;

    #[ORM\Column(type: Types::DATETIMETZ_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $incidentEndDate = null;

    #[ORM\Column(type: Types::DATETIMETZ_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $disasterCloseoutDate = null;

    #[ORM\Column(nullable: true)]
    private ?bool $tribalRequest = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $placeCode = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $designatedArea = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $declarationRequestNumber = null;

    #[ORM\Column(type: Types::DATETIMETZ_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $lastIAFilingDate = null;

    #[ORM\Column(length: 255)]
    private ?string $femaId = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $femaHash = null;

    #[ORM\Column(type: Types::DATETIMETZ_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $femaLastRefresh = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFemaDeclarationString(): ?string
    {
        return $this->femaDeclarationString;
    }

    public function setFemaDeclarationString(?string $femaDeclarationString): static
    {
        $this->femaDeclarationString = $femaDeclarationString;

        return $this;
    }

    public function getDisasterNumber(): ?int
    {
        return $this->disasterNumber;
    }

    public function setDisasterNumber(?int $disasterNumber): static
    {
        $this->disasterNumber = $disasterNumber;

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

    public function getCountyId(): ?int
    {
        return $this->countyId;
    }

    public function setCountyId(int $countyId): static
    {
        $this->countyId = $countyId;

        return $this;
    }

    public function getDeclarationType(): ?string
    {
        return $this->declarationType;
    }

    public function setDeclarationType(?string $declarationType): static
    {
        $this->declarationType = $declarationType;

        return $this;
    }

    public function getDeclarationDate(): ?\DateTimeInterface
    {
        return $this->declarationDate;
    }

    public function setDeclarationDate(?\DateTimeInterface $declarationDate): static
    {
        $this->declarationDate = $declarationDate;

        return $this;
    }

    public function getFiscalYearDeclared(): ?int
    {
        return $this->fiscalYearDeclared;
    }

    public function setFiscalYearDeclared(?int $fiscalYearDeclared): static
    {
        $this->fiscalYearDeclared = $fiscalYearDeclared;

        return $this;
    }

    public function getIncidentTypeId(): ?int
    {
        return $this->incidentTypeId;
    }

    public function setIncidentTypeId(int $incidentTypeId): static
    {
        $this->incidentTypeId = $incidentTypeId;

        return $this;
    }

    public function getDeclarationTitle(): ?string
    {
        return $this->declarationTitle;
    }

    public function setDeclarationTitle(string $declarationTitle): static
    {
        $this->declarationTitle = $declarationTitle;

        return $this;
    }

    public function isIhProgramDeclared(): ?bool
    {
        return $this->ihProgramDeclared;
    }

    public function setIhProgramDeclared(?bool $ihProgramDeclared): static
    {
        $this->ihProgramDeclared = $ihProgramDeclared;

        return $this;
    }

    public function isIaProgramDeclared(): ?bool
    {
        return $this->iaProgramDeclared;
    }

    public function setIaProgramDeclared(?bool $iaProgramDeclared): static
    {
        $this->iaProgramDeclared = $iaProgramDeclared;

        return $this;
    }

    public function isPaProgramDeclared(): ?bool
    {
        return $this->paProgramDeclared;
    }

    public function setPaProgramDeclared(?bool $paProgramDeclared): static
    {
        $this->paProgramDeclared = $paProgramDeclared;

        return $this;
    }

    public function isHmProgramDeclared(): ?bool
    {
        return $this->hmProgramDeclared;
    }

    public function setHmProgramDeclared(?bool $hmProgramDeclared): static
    {
        $this->hmProgramDeclared = $hmProgramDeclared;

        return $this;
    }

    public function getIncidentBeginDate(): ?\DateTimeInterface
    {
        return $this->incidentBeginDate;
    }

    public function setIncidentBeginDate(?\DateTimeInterface $incidentBeginDate): static
    {
        $this->incidentBeginDate = $incidentBeginDate;

        return $this;
    }

    public function getIncidentEndDate(): ?\DateTimeInterface
    {
        return $this->incidentEndDate;
    }

    public function setIncidentEndDate(?\DateTimeInterface $incidentEndDate): static
    {
        $this->incidentEndDate = $incidentEndDate;

        return $this;
    }

    public function getDisasterCloseoutDate(): ?\DateTimeInterface
    {
        return $this->disasterCloseoutDate;
    }

    public function setDisasterCloseoutDate(?\DateTimeInterface $disasterCloseoutDate): static
    {
        $this->disasterCloseoutDate = $disasterCloseoutDate;

        return $this;
    }

    public function isTribalRequest(): ?bool
    {
        return $this->tribalRequest;
    }

    public function setTribalRequest(?bool $tribalRequest): static
    {
        $this->tribalRequest = $tribalRequest;

        return $this;
    }

    public function getPlaceCode(): ?string
    {
        return $this->placeCode;
    }

    public function setPlaceCode(?string $placeCode): static
    {
        $this->placeCode = $placeCode;

        return $this;
    }

    public function getDesignatedArea(): ?string
    {
        return $this->designatedArea;
    }

    public function setDesignatedArea(?string $designatedArea): static
    {
        $this->designatedArea = $designatedArea;

        return $this;
    }

    public function getDeclarationRequestNumber(): ?string
    {
        return $this->declarationRequestNumber;
    }

    public function setDeclarationRequestNumber(?string $declarationRequestNumber): static
    {
        $this->declarationRequestNumber = $declarationRequestNumber;

        return $this;
    }

    public function getLastIAFilingDate(): ?\DateTimeInterface
    {
        return $this->lastIAFilingDate;
    }

    public function setLastIAFilingDate(?\DateTimeInterface $lastIAFilingDate): static
    {
        $this->lastIAFilingDate = $lastIAFilingDate;

        return $this;
    }

    public function getFemaId(): ?string
    {
        return $this->femaId;
    }

    public function setFemaId(string $femaId): static
    {
        $this->femaId = $femaId;

        return $this;
    }

    public function getFemaHash(): ?string
    {
        return $this->femaHash;
    }

    public function setFemaHash(?string $femaHash): static
    {
        $this->femaHash = $femaHash;

        return $this;
    }

    public function getFemaLastRefresh(): ?\DateTimeInterface
    {
        return $this->femaLastRefresh;
    }

    public function setFemaLastRefresh(?\DateTimeInterface $femaLastRefresh): static
    {
        $this->femaLastRefresh = $femaLastRefresh;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
