<?php

namespace App\Entity;

use App\Repository\TipsRepository;
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
     * @ORM\ManyToOne(targetEntity=Techno::class, inversedBy="tips")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idTechno;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="tips")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idUser;

    /**
     * @ORM\ManyToOne(targetEntity=CategorieTips::class, inversedBy="tips")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idCategorie;

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

    public function getIdTechno(): ?Techno
    {
        return $this->idTechno;
    }

    public function setIdTechno(?Techno $idTechno): self
    {
        $this->idTechno = $idTechno;

        return $this;
    }

    public function getIdUser(): ?User
    {
        return $this->idUser;
    }

    public function setIdUser(?User $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }

    public function getIdCategorie(): ?CategorieTips
    {
        return $this->idCategorie;
    }

    public function setIdCategorie(?CategorieTips $idCategorie): self
    {
        $this->idCategorie = $idCategorie;

        return $this;
    }
}
