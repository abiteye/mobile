<?php

namespace App\Entity;

use App\Repository\AdminSystemRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdminSystemRepository::class)
 */
class AdminSystem extends User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=AdminSystem::class, inversedBy="compte")
     */
    private $adminSystem;

    /**
     * @ORM\OneToMany(targetEntity=AdminSystem::class, mappedBy="adminSystem")
     */
    private $compte;

    /**
     * @ORM\OneToMany(targetEntity=Depot::class, mappedBy="adminsystem")
     */
    private $depots;

    public function __construct()
    {
        $this->compte = new ArrayCollection();
        $this->depots = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdminSystem(): ?self
    {
        return $this->adminSystem;
    }

    public function setAdminSystem(?self $adminSystem): self
    {
        $this->adminSystem = $adminSystem;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getCompte(): Collection
    {
        return $this->compte;
    }

    public function addCompte(self $compte): self
    {
        if (!$this->compte->contains($compte)) {
            $this->compte[] = $compte;
            $compte->setAdminSystem($this);
        }

        return $this;
    }

    public function removeCompte(self $compte): self
    {
        if ($this->compte->removeElement($compte)) {
            // set the owning side to null (unless already changed)
            if ($compte->getAdminSystem() === $this) {
                $compte->setAdminSystem(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Depot[]
     */
    public function getDepots(): Collection
    {
        return $this->depots;
    }

    public function addDepot(Depot $depot): self
    {
        if (!$this->depots->contains($depot)) {
            $this->depots[] = $depot;
            $depot->setAdminsystem($this);
        }

        return $this;
    }

    public function removeDepot(Depot $depot): self
    {
        if ($this->depots->removeElement($depot)) {
            // set the owning side to null (unless already changed)
            if ($depot->getAdminsystem() === $this) {
                $depot->setAdminsystem(null);
            }
        }

        return $this;
    }
}
