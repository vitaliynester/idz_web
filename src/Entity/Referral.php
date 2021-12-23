<?php

namespace App\Entity;

use App\Repository\ReferralRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReferralRepository::class)
 */
class Referral
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
    private $referralName;

    /**
     * @ORM\ManyToMany(targetEntity=Department::class, mappedBy="referral")
     */
    private $departments;

    public function __construct()
    {
        $this->departments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReferralName(): ?string
    {
        return $this->referralName;
    }

    public function setReferralName(string $referralName): self
    {
        $this->referralName = $referralName;

        return $this;
    }

    /**
     * @return Collection|Department[]
     */
    public function getDepartments(): Collection
    {
        return $this->departments;
    }

    public function __toString()
    {
        return $this->referralName;
    }

    public function addDepartment1(Department $department1): self
    {
        if (!$this->departments->contains($department1)) {
            $this->departments[] = $department1;
            $department1->addReferral($this);
        }

        return $this;
    }

    public function removeDepartment1(Department $department1): self
    {
        if ($this->departments->removeElement($department1)) {
            $department1->removeReferral($this);
        }

        return $this;
    }
}
