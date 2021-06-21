<?php

namespace App\Entity;

use App\Repository\MaintenancePersonnelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MaintenancePersonnelRepository::class)
 */
class MaintenancePersonnel
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=QualityFactorWorkPerformed::class, mappedBy="maintenancePersonnel", cascade={"remove"})
     */
    private $relationQFWP;

    /**
     * @ORM\OneToMany(targetEntity=WorkersQualificationCoefficients::class, mappedBy="maintenancePersonnel", cascade={"remove"})
     */
    private $relationWQC;

    /**
     * @ORM\OneToMany(targetEntity=WorkersSkillLevel::class, mappedBy="maintenancePersonnel", cascade={"remove"})
     */
    private $relationWSL;

    public function __construct()
    {
        $this->relationQFWP = new ArrayCollection();
        $this->relationWQC = new ArrayCollection();
        $this->relationWSL = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|QualityFactorWorkPerformed[]
     */
    public function getRelationQFWP(): Collection
    {
        return $this->relationQFWP;
    }

    public function addRelationQFWP(QualityFactorWorkPerformed $relationQFWP): self
    {
        if (!$this->relationQFWP->contains($relationQFWP)) {
            $this->relationQFWP[] = $relationQFWP;
            $relationQFWP->setMaintenancePersonnel($this);
        }

        return $this;
    }

    public function removeRelationQFWP(QualityFactorWorkPerformed $relationQFWP): self
    {
        if ($this->relationQFWP->removeElement($relationQFWP)) {
            // set the owning side to null (unless already changed)
            if ($relationQFWP->getMaintenancePersonnel() === $this) {
                $relationQFWP->setMaintenancePersonnel(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|WorkersQualificationCoefficients[]
     */
    public function getRelationWQC(): Collection
    {
        return $this->relationWQC;
    }

    public function addRelationWQC(WorkersQualificationCoefficients $relationWQC): self
    {
        if (!$this->relationWQC->contains($relationWQC)) {
            $this->relationWQC[] = $relationWQC;
            $relationWQC->setMaintenancePersonnel($this);
        }

        return $this;
    }

    public function removeRelationWQC(WorkersQualificationCoefficients $relationWQC): self
    {
        if ($this->relationWQC->removeElement($relationWQC)) {
            // set the owning side to null (unless already changed)
            if ($relationWQC->getMaintenancePersonnel() === $this) {
                $relationWQC->setMaintenancePersonnel(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|WorkersSkillLevel[]
     */
    public function getRelationWSL(): Collection
    {
        return $this->relationWSL;
    }

    public function addRelationWSL(WorkersSkillLevel $relationWSL): self
    {
        if (!$this->relationWSL->contains($relationWSL)) {
            $this->relationWSL[] = $relationWSL;
            $relationWSL->setMaintenancePersonnel($this);
        }

        return $this;
    }

    public function removeRelationWSL(WorkersSkillLevel $relationWSL): self
    {
        if ($this->relationWSL->removeElement($relationWSL)) {
            // set the owning side to null (unless already changed)
            if ($relationWSL->getMaintenancePersonnel() === $this) {
                $relationWSL->setMaintenancePersonnel(null);
            }
        }

        return $this;
    }
    
    public function __toString()
    {
        return (string)$this->id;
    }
}
