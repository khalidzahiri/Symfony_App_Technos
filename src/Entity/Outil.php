<?php

namespace App\Entity;

use App\Repository\OutilRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OutilRepository::class)
 */
class Outil
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
     * @ORM\Column(type="string", length=500)
     */
    private $resume;

    /**
     * @ORM\ManyToMany(targetEntity=Techno::class, inversedBy="outils")
     */
    private $idTechno;

    public function __construct()
    {
        $this->idTechno = new ArrayCollection();
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

    public function getResume(): ?string
    {
        return $this->resume;
    }

    public function setResume(string $resume): self
    {
        $this->resume = $resume;

        return $this;
    }

    /**
     * @return Collection|Techno[]
     */
    public function getIdTechno(): Collection
    {
        return $this->idTechno;
    }

    public function addIdTechno(Techno $idTechno): self
    {
        if (!$this->idTechno->contains($idTechno)) {
            $this->idTechno[] = $idTechno;
        }

        return $this;
    }

    public function removeIdTechno(Techno $idTechno): self
    {
        $this->idTechno->removeElement($idTechno);

        return $this;
    }
}
