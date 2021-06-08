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
     * @ORM\OneToMany(targetEntity=WorkComplexityFactors::class, mappedBy="typesOfEMAR")
     */
    private $relation;

    public function __construct()
    {
        $this->relation = new ArrayCollection();
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

    /**
     * @return Collection|WorkComplexityFactors[]
     */
    public function getRelation(): Collection
    {
        return $this->relation;
    }

    public function addRelation(WorkComplexityFactors $relation): self
    {
        if (!$this->relation->contains($relation)) {
            $this->relation[] = $relation;
            $relation->setTypesOfEMAR($this);
        }

        return $this;
    }

    public function removeRelation(WorkComplexityFactors $relation): self
    {
        if ($this->relation->removeElement($relation)) {
            // set the owning side to null (unless already changed)
            if ($relation->getTypesOfEMAR() === $this) {
                $relation->setTypesOfEMAR(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->typeOfEMAR;
    }
}
