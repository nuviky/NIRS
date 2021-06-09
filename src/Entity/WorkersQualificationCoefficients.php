<?php

namespace App\Entity;

use App\Repository\WorkersQualificationCoefficientsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=WorkersQualificationCoefficientsRepository::class)
 */
class WorkersQualificationCoefficients
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
    private $qualificationCoefficient;

    /**
     * @ORM\ManyToOne(targetEntity=MaintenancePersonnel::class, inversedBy="relationWQC")
     * @ORM\JoinColumn(nullable=false)
     */
    private $maintenancePersonnel;

    /**
     * @ORM\ManyToOne(targetEntity=AggregatesWTO::class, inversedBy="workersQualificationCoefficients")
     * @ORM\JoinColumn(nullable=false)
     */
    private $relation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQualificationCoefficient(): ?string
    {
        return $this->qualificationCoefficient;
    }

    public function setQualificationCoefficient(string $qualificationCoefficient): self
    {
        $this->qualificationCoefficient = $qualificationCoefficient;

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

    public function __toString()
    {
        return $this->qualificationCoefficient;
    }
}
