<?php

namespace App\Entity;

use App\Repository\TypesOfEMARRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypesOfEMARRepository::class)
 */
class TypesOfEMAR
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
    private $typeOfEMAR;

    /**
     * @ORM\ManyToOne(targetEntity=AggregatesWTO::class, inversedBy="relation")
     * @ORM\JoinColumn(nullable=false)
     */
    private $aggregatesWTO;

    /**
     * @ORM\OneToMany(targetEntity=WorkComplexityFactors::class, mappedBy="TypeOfEMAR")
     */
    private $workComplexityFactors;

    /**
     * @ORM\OneToMany(targetEntity=QualityFactorWorkPerformed::class, mappedBy="TypeOfEMAR")
     */
    private $qualityFactorWorkPerformeds;



    public function __construct()
    {
        $this->relation = new ArrayCollection();
        $this->workComplexityFactors = new ArrayCollection();
        $this->qualityFactorWorkPerformeds = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeOfEMAR(): ?string
    {
        return $this->typeOfEMAR;
    }

    public function setTypeOfEMAR(string $typeOfEMAR): self
    {
        $this->typeOfEMAR = $typeOfEMAR;

        return $this;
    }

    public function getAggregatesWTO(): ?AggregatesWTO
    {
        return $this->aggregatesWTO;
    }

    public function setAggregatesWTO(?AggregatesWTO $aggregatesWTO): self
    {
        $this->aggregatesWTO = $aggregatesWTO;

        return $this;
    }



    public function __toString()
    {
        $tmp = self::getAggregatesWTO();
        return $tmp . '->' . $this->typeOfEMAR;
    }

    /**
     * @return Collection|WorkComplexityFactors[]
     */
    public function getWorkComplexityFactors(): Collection
    {
        return $this->workComplexityFactors;
    }

    public function addWorkComplexityFactor(WorkComplexityFactors $workComplexityFactor): self
    {
        if (!$this->workComplexityFactors->contains($workComplexityFactor)) {
            $this->workComplexityFactors[] = $workComplexityFactor;
            $workComplexityFactor->setTypeOfEMAR($this);
        }

        return $this;
    }

    public function removeWorkComplexityFactor(WorkComplexityFactors $workComplexityFactor): self
    {
        if ($this->workComplexityFactors->removeElement($workComplexityFactor)) {
            // set the owning side to null (unless already changed)
            if ($workComplexityFactor->getTypeOfEMAR() === $this) {
                $workComplexityFactor->setTypeOfEMAR(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|QualityFactorWorkPerformed[]
     */
    public function getQualityFactorWorkPerformeds(): Collection
    {
        return $this->qualityFactorWorkPerformeds;
    }

    public function addQualityFactorWorkPerformed(QualityFactorWorkPerformed $qualityFactorWorkPerformed): self
    {
        if (!$this->qualityFactorWorkPerformeds->contains($qualityFactorWorkPerformed)) {
            $this->qualityFactorWorkPerformeds[] = $qualityFactorWorkPerformed;
            $qualityFactorWorkPerformed->setTypeOfEMAR($this);
        }

        return $this;
    }

    public function removeQualityFactorWorkPerformed(QualityFactorWorkPerformed $qualityFactorWorkPerformed): self
    {
        if ($this->qualityFactorWorkPerformeds->removeElement($qualityFactorWorkPerformed)) {
            // set the owning side to null (unless already changed)
            if ($qualityFactorWorkPerformed->getTypeOfEMAR() === $this) {
                $qualityFactorWorkPerformed->setTypeOfEMAR(null);
            }
        }

        return $this;
    }
}
