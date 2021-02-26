<?php

namespace App\Entity;

use App\Repository\DepotRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DepotRepository::class)
 */
class Depot
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date_depot;

    /**
     * @ORM\ManyToOne(targetEntity=Caissier::class, inversedBy="depots")
     */
    private $caissier;

    /**
     * @ORM\ManyToOne(targetEntity=AdminSystem::class, inversedBy="depots")
     */
    private $adminsystem;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDepot(): ?\DateTimeInterface
    {
        return $this->date_depot;
    }

    public function setDateDepot(\DateTimeInterface $date_depot): self
    {
        $this->date_depot = $date_depot;

        return $this;
    }

    public function getCaissier(): ?Caissier
    {
        return $this->caissier;
    }

    public function setCaissier(?Caissier $caissier): self
    {
        $this->caissier = $caissier;

        return $this;
    }

    public function getAdminsystem(): ?AdminSystem
    {
        return $this->adminsystem;
    }

    public function setAdminsystem(?AdminSystem $adminsystem): self
    {
        $this->adminsystem = $adminsystem;

        return $this;
    }
}
