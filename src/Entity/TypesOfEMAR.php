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



    public function __toString()
    {
        return $this->typeOfEMAR;
    }
}
