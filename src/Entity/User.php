<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Exception;
use Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Serializable;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(
 *     fields={"email"},
 *     message="Un compte existe déjà avec cette adresse mail"
 * )
 * @method string getUserIdentifier()
 */
class User implements UserInterface, \Serializable
{
    // notre user implémentant userInterface hérite à  présent obligatoirement des méthodes de cette interface
    // getPassword(), getSalt, getRoles(), eraseCedentials(), getUsername

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Veuillez remplir le champs")
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email(message="Merci de saisir un email valide")
     * @Assert\NotBlank(message="Veuillez remplir le champs")
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Veuillez remplir le champs")
     *
     */
    private $password;

    /**
     * @Assert\EqualTo(propertyPath="password", message="Les mots de passe ne sont pas identiques")
     * @Assert\NotBlank(message="Veuillez remplir le champs")
     */
    public $confirmPassword;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Veuillez remplir le champs")
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Veuillez remplir le champs")
     */
    private $prenom;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = ["ROLE_USER"];


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $reset;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photo;

    // propriété créée pour gérer la modification de photo dans le formulaire qui n'est pas reliée à la BDD (n'a pas en parametre @ORM\column)
    public $photoModif;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $linkedin;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $github;

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $tutofavoris = [];

    /**
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    private $bio;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $occupation;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getRoles(): ?array
    {
        return $this->roles;
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    // getSalt() permet de faire transiter le mot de passe en text brut pour être traité pour l'encodage
    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    // cette méthode vise à nettoyer les mots de passes en text brut dans la BDD
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function __call($name, $arguments)
    {
        // TODO: Implement @method string getUserIdentifier()
    }

    public function getReset(): ?string
    {
        return $this->reset;
    }

    public function setReset(?string $reset): self
    {
        $this->reset = $reset;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getLinkedin(): ?string
    {
        return $this->linkedin;
    }

    public function setLinkedin(?string $linkedin): self
    {
        $this->linkedin = $linkedin;

        return $this;
    }

    public function getGithub(): ?string
    {
        return $this->github;
    }

    public function setGithub(?string $github): self
    {
        $this->github = $github;

        return $this;
    }

    public function getTutofavoris(): ?array
    {
        return $this->tutofavoris;
    }

    public function setTutofavoris(?array $tutofavoris): self
    {
        $this->tutofavoris = $tutofavoris;

        return $this;
    }

    public function getBio(): ?string
    {
        return $this->bio;
    }

    public function setBio(string $bio): self
    {
        $this->bio = $bio;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getOccupation(): ?string
    {
        return $this->occupation;
    }

    public function setOccupation(string $occupation): self
    {
        $this->occupation = $occupation;

        return $this;
    }

    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->email,
            $this->password,
            $this->nom,
            $this->prenom,
            $this->roles,
            $this->reset,
            $this->linkedin,
            $this->github,
            $this->tutofavoris,
            $this->bio,
            $this->ville,
            $this->occupation

            // see section on salt below
            // $this->salt,
        ));
    }

    public function unserialize($data)
    {
        list(
            $this->id,
            $this->username,
            $this->email,
            $this->password,
            $this->nom,
            $this->prenom,
            $this->roles,
            $this->reset,
            $this->linkedin,
            $this->github,
            $this->tutofavoris,
            $this->bio,
            $this->ville,
            $this->occupation
            ) = unserialize($data);
    }
}
