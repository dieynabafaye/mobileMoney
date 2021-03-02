<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UserAgenceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserAgenceRepository::class)
 * @ApiResource ()
 */
class UserAgence extends User
{
    /**
     * @ORM\ManyToMany(targetEntity=Transaction::class, inversedBy="userAgences")
     */
    private $transaction;

    /**
     * @ORM\ManyToOne(targetEntity=Agence::class, inversedBy="userAgence")
     */
    private $agence;

    public function __construct()
    {
        $this->transaction = new ArrayCollection();
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
        }

        return $this;
    }

    public function removeTransaction(Transaction $transaction): self
    {
        $this->transaction->removeElement($transaction);

        return $this;
    }

    public function getAgence(): ?Agence
    {
        return $this->agence;
    }

    public function setAgence(?Agence $agence): self
    {
        $this->agence = $agence;

        return $this;
    }
}
