<?php

namespace App\Entity;

use App\Repository\TransactionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TransactionRepository::class)
 */
class Transaction
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
    private $montant;

    /**
     * @ORM\Column(type="date")
     */
    private $dateDepot;

    /**
     * @ORM\Column(type="date")
     */
    private $dateRetrait;

    /**
     * @ORM\Column(type="date")
     */
    private $dateAnnulation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $TTC;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fraisEtat;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fraisSystem;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fraisEnvoie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fraisRetrait;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $codeTransaction;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontant(): ?string
    {
        return $this->montant;
    }

    public function setMontant(string $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getDateDepot(): ?\DateTimeInterface
    {
        return $this->dateDepot;
    }

    public function setDateDepot(\DateTimeInterface $dateDepot): self
    {
        $this->dateDepot = $dateDepot;

        return $this;
    }

    public function getDateRetrait(): ?\DateTimeInterface
    {
        return $this->dateRetrait;
    }

    public function setDateRetrait(\DateTimeInterface $dateRetrait): self
    {
        $this->dateRetrait = $dateRetrait;

        return $this;
    }

    public function getDateAnnulation(): ?\DateTimeInterface
    {
        return $this->dateAnnulation;
    }

    public function setDateAnnulation(\DateTimeInterface $dateAnnulation): self
    {
        $this->dateAnnulation = $dateAnnulation;

        return $this;
    }

    public function getTTC(): ?string
    {
        return $this->TTC;
    }

    public function setTTC(string $TTC): self
    {
        $this->TTC = $TTC;

        return $this;
    }

    public function getFraisEtat(): ?string
    {
        return $this->fraisEtat;
    }

    public function setFraisEtat(string $fraisEtat): self
    {
        $this->fraisEtat = $fraisEtat;

        return $this;
    }

    public function getFraisSystem(): ?string
    {
        return $this->fraisSystem;
    }

    public function setFraisSystem(string $fraisSystem): self
    {
        $this->fraisSystem = $fraisSystem;

        return $this;
    }

    public function getFraisEnvoie(): ?string
    {
        return $this->fraisEnvoie;
    }

    public function setFraisEnvoie(string $fraisEnvoie): self
    {
        $this->fraisEnvoie = $fraisEnvoie;

        return $this;
    }

    public function getFraisRetrait(): ?string
    {
        return $this->fraisRetrait;
    }

    public function setFraisRetrait(string $fraisRetrait): self
    {
        $this->fraisRetrait = $fraisRetrait;

        return $this;
    }

    public function getCodeTransaction(): ?string
    {
        return $this->codeTransaction;
    }

    public function setCodeTransaction(string $codeTransaction): self
    {
        $this->codeTransaction = $codeTransaction;

        return $this;
    }
}
