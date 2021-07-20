<?php

namespace App\Entity;

use App\Repository\CategorieTipsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategorieTipsRepository::class)
 */
class CategorieTips
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
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity=Tips::class, mappedBy="idCategorie")
     */
    private $tips;

    public function __construct()
    {
        $this->tips = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection|Tips[]
     */
    public function getTips(): Collection
    {
        return $this->tips;
    }

    public function addTip(Tips $tip): self
    {
        if (!$this->tips->contains($tip)) {
            $this->tips[] = $tip;
            $tip->setIdCategorie($this);
        }

        return $this;
    }

    public function removeTip(Tips $tip): self
    {
        if ($this->tips->removeElement($tip)) {
            // set the owning side to null (unless already changed)
            if ($tip->getIdCategorie() === $this) {
                $tip->setIdCategorie(null);
            }
        }

        return $this;
    }
}
