<?php

namespace App\Entity;

use App\Repository\TipsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TipsRepository::class)
 */
class Tips
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
     * @ORM\Column(type="string", length=1000)
     */
    private $resume;

    /**
     * @ORM\ManyToMany(targetEntity=Techno::class, inversedBy="tips")
     */
    private $techno;

    /**
     * @ORM\ManyToOne(targetEntity=CategorieTips::class, inversedBy="tips")
     */
    private $categorieTips;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $userName;

    public function __construct()
    {
        $this->techno = new ArrayCollection();
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
    public function getTechno(): Collection
    {
        return $this->techno;
    }

    public function addTechno(Techno $techno): self
    {
        if (!$this->techno->contains($techno)) {
            $this->techno[] = $techno;
        }

        return $this;
    }

    public function removeTechno(Techno $techno): self
    {
        $this->techno->removeElement($techno);

        return $this;
    }

    public function getCategorieTips(): ?CategorieTips
    {
        return $this->categorieTips;
    }

    public function setCategorieTips(?CategorieTips $categorieTips): self
    {
        $this->categorieTips = $categorieTips;

        return $this;
    }

    public function getUserName(): ?string
    {
        return $this->userName;
    }

    public function setUserName(string $userName): self
    {
        $this->userName = $userName;

        return $this;
    }

}
