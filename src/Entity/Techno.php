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
 * @ORM\ManyToMany(targetEntity=Tips::class, mappedBy="techno")
 */
private $tips;

/**
 * @ORM\ManyToMany(targetEntity=Tutoriel::class, mappedBy="techno")
 */
private $tutoriels;

/**
 * @ORM\ManyToMany(targetEntity=Outil::class, mappedBy="techno")
 */
private $outils;

public function __construct()
{
    $this->outils = new ArrayCollection();
    $this->tips = new ArrayCollection();
    $this->tutoriels = new ArrayCollection();
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
        $tip->addTechno($this);
    }

    return $this;
}

public function removeTip(Tips $tip): self
{
    if ($this->tips->removeElement($tip)) {
        $tip->removeTechno($this);
    }

    return $this;
}

/**
 * @return Collection|Tutoriel[]
 */
public function getTutoriels(): Collection
{
    return $this->tutoriels;
}

public function addTutoriel(Tutoriel $tutoriel): self
{
    if (!$this->tutoriels->contains($tutoriel)) {
        $this->tutoriels[] = $tutoriel;
        $tutoriel->addTechno($this);
    }

    return $this;
}

public function removeTutoriel(Tutoriel $tutoriel): self
{
    if ($this->tutoriels->removeElement($tutoriel)) {
        $tutoriel->removeTechno($this);
    }

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
        $outil->addTechno($this);
    }

    return $this;
}

public function removeOutil(Outil $outil): self
{
    if ($this->outils->removeElement($outil)) {
        $outil->removeTechno($this);
    }

    return $this;
}
}

