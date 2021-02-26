<?php

namespace App\Entity;

use App\Repository\TransactionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TransactionRepository::class)
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="profil", type="string")
 * @ORM\DiscriminatorMap({"transactionencous" = "TransactionEnCours", "transactionterminee" = "TransactionTerminee"})
 */
abstract class Transaction 
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $montant;

    /**
     * @ORM\Column(type="date")
     */
    private $date_depot;

    /**
     * @ORM\Column(type="date")
     */
    private $date_retrait;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $code_transfert;

    /**
     * @ORM\Column(type="integer")
     */
    private $frais;

    /**
     * @ORM\Column(type="integer")
     */
    private $frais_depot;

    /**
     * @ORM\Column(type="integer")
     */
    private $frais_retrait;

    /**
     * @ORM\Column(type="integer")
     */
    private $frais_etat;

    /**
     * @ORM\Column(type="integer")
     */
    private $frais_systeme;

    /**
     * @ORM\ManyToOne(targetEntity=Agent::class, inversedBy="transactions")
     */
    private $agent_retrait;

    /**
     * @ORM\ManyToOne(targetEntity=Agent::class, inversedBy="transactions")
     */
    private $agent_depot;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="transactions")
     */
    private $client_depot;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="transactions")
     */
    private $client_retrait;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(int $montant): self
    {
        $this->montant = $montant;

        return $this;
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

    public function getDateRetrait(): ?\DateTimeInterface
    {
        return $this->date_retrait;
    }

    public function setDateRetrait(\DateTimeInterface $date_retrait): self
    {
        $this->date_retrait = $date_retrait;

        return $this;
    }

    public function getCodeTransfert(): ?string
    {
        return $this->code_transfert;
    }

    public function setCodeTransfert(string $code_transfert): self
    {
        $this->code_transfert = $code_transfert;

        return $this;
    }

    public function getFrais(): ?int
    {
        return $this->frais;
    }

    public function setFrais(int $frais): self
    {
        $this->frais = $frais;

        return $this;
    }

    public function getFraisDepot(): ?int
    {
        return $this->frais_depot;
    }

    public function setFraisDepot(int $frais_depot): self
    {
        $this->frais_depot = $frais_depot;

        return $this;
    }

    public function getFraisRetrait(): ?int
    {
        return $this->frais_retrait;
    }

    public function setFraisRetrait(int $frais_retrait): self
    {
        $this->frais_retrait = $frais_retrait;

        return $this;
    }

    public function getFraisEtat(): ?int
    {
        return $this->frais_etat;
    }

    public function setFraisEtat(int $frais_etat): self
    {
        $this->frais_etat = $frais_etat;

        return $this;
    }

    public function getFraisSysteme(): ?int
    {
        return $this->frais_systeme;
    }

    public function setFraisSysteme(int $frais_systeme): self
    {
        $this->frais_systeme = $frais_systeme;

        return $this;
    }

    public function getAgentRetrait(): ?Agent
    {
        return $this->agent_retrait;
    }

    public function setAgentRetrait(?Agent $agent_retrait): self
    {
        $this->agent_retrait = $agent_retrait;

        return $this;
    }

    public function getAgentDepot(): ?Agent
    {
        return $this->agent_depot;
    }

    public function setAgentDepot(?Agent $agent_depot): self
    {
        $this->agent_depot = $agent_depot;

        return $this;
    }

    public function getClientDepot(): ?Client
    {
        return $this->client_depot;
    }

    public function setClientDepot(?Client $client_depot): self
    {
        $this->client_depot = $client_depot;

        return $this;
    }

    public function getClientRetrait(): ?Client
    {
        return $this->client_retrait;
    }

    public function setClientRetrait(?Client $client_retrait): self
    {
        $this->client_retrait = $client_retrait;

        return $this;
    }
}
