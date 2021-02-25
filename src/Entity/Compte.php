<?php

namespace App\Entity;

use App\Repository\CompteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompteRepository::class)
 */
class Compte
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
    private $numCompte;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $solde;

    /**
     * @ORM\OneToMany(targetEntity=Transaction::class, mappedBy="compte")
     */
    private $transaction;

    /**
     * @ORM\ManyToMany(targetEntity=Caissier::class, mappedBy="compte")
     */
    private $caissiers;

    /**
     * @ORM\ManyToOne(targetEntity=AdminSystem::class, inversedBy="compte")
     */
    private $adminSystem;

    public function __construct()
    {
        $this->transaction = new ArrayCollection();
        $this->caissiers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumCompte(): ?string
    {
        return $this->numCompte;
    }

    public function setNumCompte(string $numCompte): self
    {
        $this->numCompte = $numCompte;

        return $this;
    }

    public function getSolde(): ?string
    {
        return $this->solde;
    }

    public function setSolde(string $solde): self
    {
        $this->solde = $solde;

        return $this;
    }

    /**
     * @return Collection|Transaction[]
     */
    public function getTransaction(): Collection
    {
        return $this->transaction;
    }

    public function addTransaction(Transaction $transaction): self
    {
        if (!$this->transaction->contains($transaction)) {
            $this->transaction[] = $transaction;
            $transaction->setCompte($this);
        }

        return $this;
    }

    public function removeTransaction(Transaction $transaction): self
    {
        if ($this->transaction->removeElement($transaction)) {
            // set the owning side to null (unless already changed)
            if ($transaction->getCompte() === $this) {
                $transaction->setCompte(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Caissier[]
     */
    public function getCaissiers(): Collection
    {
        return $this->caissiers;
    }

    public function addCaissier(Caissier $caissier): self
    {
        if (!$this->caissiers->contains($caissier)) {
            $this->caissiers[] = $caissier;
            $caissier->addCompte($this);
        }

        return $this;
    }

    public function removeCaissier(Caissier $caissier): self
    {
        if ($this->caissiers->removeElement($caissier)) {
            $caissier->removeCompte($this);
        }

        return $this;
    }

    public function getAdminSystem(): ?AdminSystem
    {
        return $this->adminSystem;
    }

    public function setAdminSystem(?AdminSystem $adminSystem): self
    {
        $this->adminSystem = $adminSystem;

        return $this;
    }

}
