<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AgenceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AgenceRepository::class)
 * @ApiResource (
 *     collectionOperations={
            "get", "addAgence"={"method":"post","path":"/agences","route_name"="addingAgence"}
 *     },
 *
 *     itemOperations={
            "get", "put", "delete"
 *     }
 * )
 */
class Agence
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
    private $nomAgence;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="boolean")
     */
    private $status=false;

    /**
     * @ORM\OneToOne(targetEntity=Compte::class, cascade={"persist", "remove"})
     */
    private $compte;

    /**
     * @ORM\OneToMany(targetEntity=UserAgence::class, mappedBy="agence")
     */
    private $userAgence;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->userAgence = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomAgence(): ?string
    {
        return $this->nomAgence;
    }

    public function setNomAgence(string $nomAgence): self
    {
        $this->nomAgence = $nomAgence;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getAgence() === $this) {
                $user->setAgence(null);
            }
        }

        return $this;
    }

    public function getCompte(): ?Compte
    {
        return $this->compte;
    }

    public function setCompte(?Compte $compte): self
    {
        $this->compte = $compte;

        return $this;
    }

    /**
     * @return Collection|UserAgence[]
     */
    public function getUserAgence(): Collection
    {
        return $this->userAgence;
    }

    public function addUserAgence(UserAgence $userAgence): self
    {
        if (!$this->userAgence->contains($userAgence)) {
            $this->userAgence[] = $userAgence;
            $userAgence->setAgence($this);
        }

        return $this;
    }

    public function removeUserAgence(UserAgence $userAgence): self
    {
        if ($this->userAgence->removeElement($userAgence)) {
            // set the owning side to null (unless already changed)
            if ($userAgence->getAgence() === $this) {
                $userAgence->setAgence(null);
            }
        }

        return $this;
    }
}
