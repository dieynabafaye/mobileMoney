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
    private $dateDepot;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $montantDepot;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getMontantDepot(): ?string
    {
        return $this->montantDepot;
    }

    public function setMontantDepot(string $montantDepot): self
    {
        $this->montantDepot = $montantDepot;

        return $this;
    }
}
