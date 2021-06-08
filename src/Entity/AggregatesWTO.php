<?php

namespace App\Entity;

use App\Repository\AggregatesWTORepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AggregatesWTORepository::class)
 */
class AggregatesWTO
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
    private $aggregateWTO;

    /**
     * @ORM\ManyToOne(targetEntity=TypesOfWTO::class, inversedBy="relation")
     * @ORM\JoinColumn(nullable=false)
     */
    private $typesOfWTO;

    /**
     * @ORM\OneToMany(targetEntity=TypesOfEMAR::class, mappedBy="aggregatesWTO")
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

    public function getAggregateWTO(): ?string
    {
        return $this->aggregateWTO;
    }

    public function setAggregateWTO(string $aggregateWTO): self
    {
        $this->aggregateWTO = $aggregateWTO;

        return $this;
    }

    public function getTypesOfWTO(): ?TypesOfWTO
    {
        return $this->typesOfWTO;
    }

    public function setTypesOfWTO(?TypesOfWTO $typesOfWTO): self
    {
        $this->typesOfWTO = $typesOfWTO;

        return $this;
    }

    /**
     * @return Collection|TypesOfEMAR[]
     */
    public function getRelation(): Collection
    {
        return $this->relation;
    }

    public function addRelation(TypesOfEMAR $relation): self
    {
        if (!$this->relation->contains($relation)) {
            $this->relation[] = $relation;
            $relation->setAggregatesWTO($this);
        }

        return $this;
    }

    public function removeRelation(TypesOfEMAR $relation): self
    {
        if ($this->relation->removeElement($relation)) {
            // set the owning side to null (unless already changed)
            if ($relation->getAggregatesWTO() === $this) {
                $relation->setAggregatesWTO(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->aggregateWTO;
    }
}
