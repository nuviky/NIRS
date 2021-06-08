<?php

namespace App\Entity;

use App\Repository\WorkersSkillLevelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
    private $workerSkillLevel;

    /**
     * @ORM\OneToMany(targetEntity=WorkersQualificationCoefficients::class, mappedBy="workersSkillLevel")
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

    public function getWorkerSkillLevel(): ?string
    {
        return $this->workerSkillLevel;
    }

    public function setWorkerSkillLevel(string $workerSkillLevel): self
    {
        $this->workerSkillLevel = $workerSkillLevel;

        return $this;
    }

    /**
     * @return Collection|WorkersQualificationCoefficients[]
     */
    public function getRelation(): Collection
    {
        return $this->relation;
    }

    public function addRelation(WorkersQualificationCoefficients $relation): self
    {
        if (!$this->relation->contains($relation)) {
            $this->relation[] = $relation;
            $relation->setWorkersSkillLevel($this);
        }

        return $this;
    }

    public function removeRelation(WorkersQualificationCoefficients $relation): self
    {
        if ($this->relation->removeElement($relation)) {
            // set the owning side to null (unless already changed)
            if ($relation->getWorkersSkillLevel() === $this) {
                $relation->setWorkersSkillLevel(null);
            }
        }

        return $this;
    }
}
