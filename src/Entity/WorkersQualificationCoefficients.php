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
    private $workerQualificationCoefficients;

    /**
     * @ORM\ManyToOne(targetEntity=WorkersSkillLevel::class, inversedBy="relation")
     * @ORM\JoinColumn(nullable=false)
     */
    private $workersSkillLevel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWorkerQualificationCoefficients(): ?string
    {
        return $this->workerQualificationCoefficients;
    }

    public function setWorkerQualificationCoefficients(string $workerQualificationCoefficients): self
    {
        $this->workerQualificationCoefficients = $workerQualificationCoefficients;

        return $this;
    }

    public function getWorkersSkillLevel(): ?WorkersSkillLevel
    {
        return $this->workersSkillLevel;
    }

    public function setWorkersSkillLevel(?WorkersSkillLevel $workersSkillLevel): self
    {
        $this->workersSkillLevel = $workersSkillLevel;

        return $this;
    }
}
