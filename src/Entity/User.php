<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(
 *     fields={"email"},
 *     message="Un compte existe déjà avec cette adresse mail"
 * )
 * @method string getUserIdentifier()
 */
class User implements UserInterface
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
     * @Assert\EqualTo(propertyPath="confirmPassword", message="Les mots de passe ne sont pas identiques")
     */
    private $password;

    public $confirmPassword;

    /**
     * @ORM\Column(type="string", length=255)
     *@Assert\NotBlank(message="Veuillez remplir le champs")
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
}
