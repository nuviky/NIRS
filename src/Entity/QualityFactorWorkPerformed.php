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
     * @ORM\ManyToOne(targetEntity=TypesOfEMAR::class, inversedBy="qualityFactorWorkPerformeds")
     */
    private $TypeOfEMAR;

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

    public function getTypeOfEMAR(): ?TypesOfEMAR
    {
        return $this->TypeOfEMAR;
    }

    public function setTypeOfEMAR(?TypesOfEMAR $TypeOfEMAR): self
    {
        $this->TypeOfEMAR = $TypeOfEMAR;

        return $this;
    }
}
