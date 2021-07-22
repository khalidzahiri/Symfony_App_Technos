<?php

namespace App\Entity;

use App\Repository\TechnoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity(repositoryClass=TechnoRepository::class)
*/
class Techno
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
* @ORM\Column(type="string", length=255)
*/
private $domaine;

/**
* @ORM\Column(type="string", length=1000)
*/
private $intro;

/**
* @ORM\Column(type="string", length=255)
*/
private $doc;

/**
* @ORM\ManyToMany(targetEntity=Outil::class, mappedBy="idTechno")
*/
private $outils;

/**
* @ORM\OneToMany(targetEntity=Tips::class, mappedBy="idTechno")
*/
private $tips;

/**
* @ORM\OneToMany(targetEntity=Tutoriel::class, mappedBy="techno")
*/
private $idTutoriel;

public function __construct()
{
$this->outils = new ArrayCollection();
$this->tips = new ArrayCollection();
$this->idTutoriel = new ArrayCollection();
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

public function getDomaine(): ?string
{
return $this->domaine;
}

public function setDomaine(string $domaine): self
{
$this->domaine = $domaine;

return $this;
}

public function getIntro(): ?string
{
return $this->intro;
}

public function setIntro(string $intro): self
{
$this->intro = $intro;

return $this;
}

public function getDoc(): ?string
{
return $this->doc;
}

public function setDoc(string $doc): self
{
$this->doc = $doc;

return $this;
}


/**
* @return Collection|Outil[]
*/
public function getOutils(): Collection
{
return $this->outils;
}

public function addOutil(Outil $outil): self
{
if (!$this->outils->contains($outil)) {
$this->outils[] = $outil;
$outil->addIdTechno($this);
}

return $this;
}

public function removeOutil(Outil $outil): self
{
if ($this->outils->removeElement($outil)) {
$outil->removeIdTechno($this);
}

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
$tip->setIdTechno($this);
}

return $this;
}

public function removeTip(Tips $tip): self
{
if ($this->tips->removeElement($tip)) {
// set the owning side to null (unless already changed)
if ($tip->getIdTechno() === $this) {
$tip->setIdTechno(null);
}
}

return $this;
}

/**
* @return Collection|Tutoriel[]
*/
public function getIdTutoriel(): Collection
{
return $this->idTutoriel;
}

public function addIdTutoriel(Tutoriel $idTutoriel): self
{
if (!$this->idTutoriel->contains($idTutoriel)) {
$this->idTutoriel[] = $idTutoriel;
$idTutoriel->setTechno($this);
}

return $this;
}

public function removeIdTutoriel(Tutoriel $idTutoriel): self
{
if ($this->idTutoriel->removeElement($idTutoriel)) {
// set the owning side to null (unless already changed)
if ($idTutoriel->getTechno() === $this) {
$idTutoriel->setTechno(null);
}
}

return $this;
}
}
