<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\EquatableInterface;

/**
 * Parteamer
 *
 * @ORM\Table(name="parteamer", indexes={@ORM\Index(name="fk_parteamer_societe", columns={"fk_parteamer_societe"})})
 * @ORM\Entity(repositoryClass="App\Repository\ParteamerRepository")
 */
class Parteamer implements UserInterface, EquatableInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="parteamer_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $parteamerId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="parteamer_nom", type="string", length=45, nullable=true)
     */
    private $parteamerNom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="parteamer_prenom", type="string", length=45, nullable=true)
     */
    private $parteamerPrenom;

    /**
     * @var string|null
     *
     * @ORM\Column(name="parteamer_mail", type="string", length=45, nullable=true)
     */
    private $parteamerMail;

    /**
     * @var string|null
     *
     * @ORM\Column(name="parteamer_ville", type="string", length=45, nullable=true)
     */
    private $parteamerVille;

    /**
     * @var string|null
     *
     * @ORM\Column(name="parteamer_tel", type="string", length=45, nullable=true)
     */
    private $parteamerTel;

    /**
     * @var int|null
     *
     * @ORM\Column(name="parteamer_cercle", type="integer", nullable=true)
     */
    private $parteamerCercle;

    /**
     * @var \Societe
     *
     * @ORM\ManyToOne(targetEntity="Societe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_parteamer_societe", referencedColumnName="societe_id")
     * })
     */
    private $fkParteamerSociete;

    /**
     * @var string|null
     *
     * @ORM\Column(name="roles", type="string", length=45, nullable=true)
     */
    private $roles;



    public function getParteamerId(): ?int
    {
        return $this->parteamerId;
    }

    public function getParteamerNom(): ?string
    {
        return $this->parteamerNom;
    }

    public function setParteamerNom(?string $parteamerNom): self
    {
        $this->parteamerNom = $parteamerNom;

        return $this;
    }

    public function getParteamerPrenom(): ?string
    {
        return $this->parteamerPrenom;
    }

    public function setParteamerPrenom(?string $parteamerPrenom): self
    {
        $this->parteamerPrenom = $parteamerPrenom;

        return $this;
    }

    public function getParteamerMail(): ?string
    {
        return $this->parteamerMail;
    }

    public function setParteamerMail(?string $parteamerMail): self
    {
        $this->parteamerMail = $parteamerMail;

        return $this;
    }

    public function getParteamerVille(): ?string
    {
        return $this->parteamerVille;
    }

    public function setParteamerVille(?string $parteamerVille): self
    {
        $this->parteamerVille = $parteamerVille;

        return $this;
    }

    public function getParteamerTel(): ?string
    {
        return $this->parteamerTel;
    }

    public function setParteamerTel(?string $parteamerTel): self
    {
        $this->parteamerTel = $parteamerTel;

        return $this;
    }

    public function getParteamerCercle(): ?int
    {
        return $this->parteamerCercle;
    }

    public function setParteamerCercle(?int $parteamerCercle): self
    {
        $this->parteamerCercle = $parteamerCercle;

        return $this;
    }

    public function getFkParteamerSociete(): ?Societe
    {
        return $this->fkParteamerSociete;
    }

    public function setFkParteamerSociete(?Societe $fkParteamerSociete): self
    {
        $this->fkParteamerSociete = $fkParteamerSociete;

        return $this;
    }

    /**
     * Returns the roles granted to the user.
     *
     * <code>
     * public function getRoles()
     * {
     *     return array('ROLE_USER');
     * }
     * </code>
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return (Role|string)[] The user roles
     */
    public function getRoles(): array
    {
        $roles = [];
        if ($this->roles != NULL) {
            $roles[] = $this->roles;
        };
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_ANONYMOUS';

        return array_unique($roles);
    }

    public function setRoles(?string $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Returns the password used to authenticate the user.
     *
     * This should be the encoded password. On authentication, a plain-text
     * password will be salted, encoded, and then compared to this value.
     *
     * @return string The password
     */
    public function getPassword()
    {
        return null;
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername()
    {
        return $this->parteamerMail;
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        return null;
    }

    public function isEqualTo(UserInterface $user)
    {
       
        if ($this->parteamerMail !== $user->getUsername()) {
            return false;
        }
        if ($this->roles !== $user->getRoles()) {
            $user->setRoles($this->roles);
        }
 
        return true;
    }

}
