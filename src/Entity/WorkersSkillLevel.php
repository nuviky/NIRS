<?php

namespace App\Entity;

use App\Repository\WorkersSkillLevelRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=WorkersSkillLevelRepository::class)
 */
class WorkersSkillLevel
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
    private $skillLevel;

    /**
     * @ORM\ManyToOne(targetEntity=MaintenancePersonnel::class, inversedBy="relationWSL")
     * @ORM\JoinColumn(nullable=false)
     */
    private $maintenancePersonnel;

    /**
     * @ORM\ManyToOne(targetEntity=TypesOfWTO::class, inversedBy="workersSkillLevels")
     * @ORM\JoinColumn(nullable=false)
     */
    private $relation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSkillLevel(): ?string
    {
        return $this->skillLevel;
    }

    public function setSkillLevel(string $skillLevel): self
    {
        $this->skillLevel = $skillLevel;

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

    public function getRelation(): ?TypesOfWTO
    {
        return $this->relation;
    }

    public function setRelation(?TypesOfWTO $relation): self
    {
        $this->relation = $relation;

        return $this;
    }

    public function __toString()
    {
        return $this->skillLevel;
    }
}
