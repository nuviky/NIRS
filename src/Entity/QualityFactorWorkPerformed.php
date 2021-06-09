<?php

namespace App\Entity;

use App\Repository\QualityFactorWorkPerformedRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=QualityFactorWorkPerformedRepository::class)
 */
class QualityFactorWorkPerformed
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $qualityFactor;

    /**
     * @ORM\ManyToOne(targetEntity=MaintenancePersonnel::class, inversedBy="relationQFWP")
     * @ORM\JoinColumn(nullable=false)
     */
    private $maintenancePersonnel;

    /**
     * @ORM\ManyToOne(targetEntity=AggregatesWTO::class, inversedBy="qualityFactorWorkPerformeds")
     * @ORM\JoinColumn(nullable=false)
     */
    private $relation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $qualityFactor1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $qualityFactor2;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $qualityFactor3;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $qualityFactor4;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $qualityFactor5;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQualityFactor(): ?string
    {
        return $this->qualityFactor;
    }

    public function setQualityFactor(string $qualityFactor): self
    {
        $this->qualityFactor = $qualityFactor;

        return $this;
    }

    public function getMaintenancePersonnel(): ?MaintenancePersonnel
    {
        return $this->maintenancePersonnel;
    }

    public function setMaintenancePersonnel(?MaintenancePersonnel $maintenancePersonnel): self
    {
        $this->maintenancePersonnel = $maintenancePersonnel;

        return $this;
    }

    public function getRelation(): ?AggregatesWTO
    {
        return $this->relation;
    }

    public function setRelation(?AggregatesWTO $relation): self
    {
        $this->relation = $relation;

        return $this;
    }

    public function getQualityFactor1(): ?string
    {
        return $this->qualityFactor1;
    }

    public function setQualityFactor1(string $qualityFactor1): self
    {
        $this->qualityFactor1 = $qualityFactor1;

        return $this;
    }

    public function getQualityFactor2(): ?string
    {
        return $this->qualityFactor2;
    }

    public function setQualityFactor2(string $qualityFactor2): self
    {
        $this->qualityFactor2 = $qualityFactor2;

        return $this;
    }

    public function getQualityFactor3(): ?string
    {
        return $this->qualityFactor3;
    }

    public function setQualityFactor3(string $qualityFactor3): self
    {
        $this->qualityFactor3 = $qualityFactor3;

        return $this;
    }

    public function getQualityFactor4(): ?string
    {
        return $this->qualityFactor4;
    }

    public function setQualityFactor4(string $qualityFactor4): self
    {
        $this->qualityFactor4 = $qualityFactor4;

        return $this;
    }

    public function getQualityFactor5(): ?string
    {
        return $this->qualityFactor5;
    }

    public function setQualityFactor5(string $qualityFactor5): self
    {
        $this->qualityFactor5 = $qualityFactor5;

        return $this;
    }
}
