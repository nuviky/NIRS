<?php

namespace App\Entity;

use App\Repository\WorkComplexityFactorsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=WorkComplexityFactorsRepository::class)
 */
class WorkComplexityFactors
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
    private $workComplexityFactor;

    /**
     * @ORM\ManyToOne(targetEntity=TypesOfEMAR::class, inversedBy="relation")
     * @ORM\JoinColumn(nullable=false)
     */
    private $typesOfEMAR;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWorkComplexityFactor(): ?string
    {
        return $this->workComplexityFactor;
    }

    public function setWorkComplexityFactor(string $workComplexityFactor): self
    {
        $this->workComplexityFactor = $workComplexityFactor;

        return $this;
    }

    public function getTypesOfEMAR(): ?TypesOfEMAR
    {
        return $this->typesOfEMAR;
    }

    public function setTypesOfEMAR(?TypesOfEMAR $typesOfEMAR): self
    {
        $this->typesOfEMAR = $typesOfEMAR;

        return $this;
    }

    public function __toString()
    {
        return $this->workComplexityFactor;
    }
}
