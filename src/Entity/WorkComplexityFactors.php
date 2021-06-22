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
     * @ORM\ManyToOne(targetEntity=TypesOfEMAR::class, inversedBy="workComplexityFactors")
     */
    private $TypeOfEMAR;



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



    public function __toString()
    {
        return $this->workComplexityFactor;
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
