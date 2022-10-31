<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface
{
    /**
     * @var string
     *
     * @ORM\Column(name="user_email", type="string", length=150, nullable=false, options={"comment"="► Définition : Email correspondant à l'utilisateur ► Règles de gestion : La valeur doit être sous le format ""xxx@xxx.xx"", Valeur récupérée via l'authentification oauth2 LinkedIn"})
     * @ORM\Id
     * 
     */
    private $userEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="user_firstname", type="string", length=100, nullable=true, options={"comment"="► Définition : Prénom correspondant à l'utilisateur ► Règles de gestion : Valeur récupérée via recruit"})
     */
    private $userFirstname;

    /**
     * @var string
     *
     * @ORM\Column(name="user_lastname", type="string", length=100, nullable=true, options={"comment"="► Définition : Nom correspondant à l'utilisateur ► Règles de gestion : Valeur récupérée via recruit"})
     */
    private $userLastname;

    /**
     * @var string
     *
     * @ORM\Column(name="user_mobile", type="string", length=20, nullable=true, options={"comment"="► Définition : Numéro de téléphone mobile correspondant à l'utilisateur ► Règles de gestion : La valeur commence par un ""0"" ou ""+33"", La valeur doit être sous le format ""0x xx xx xx xx"""})
     */
    private $userMobile;

    /**
     * @var string|null
     *
     * @ORM\Column(name="user_phone", type="string", length=20, nullable=true, options={"comment"="► Définition : Numéro de téléphone correspondant à l'utilisateur ► Règles de gestion : La valeur commence par un ""0"" ou ""+33"", La valeur doit être sous le format ""0x xx xx xx xx"""})
     */
    private $userPhone;

    /**
     * @var string|null
     *
     * @ORM\Column(name="user_street", type="string", length=250, nullable=true, options={"comment"="► Définition : Adresse de l'utilisateur ► Règles de gestion : Utilisation d'un outil d'autocomplétion de l'adresse -> Choix de son adresse dans une liste déroulante sous la forme ""NUMERO ADRESSE, CP, VILLE, PAYS"})
     */
    private $userStreet;

    /**
     * @var string|null
     *
     * @ORM\Column(name="user_complement", type="string", length=250, nullable=true, options={"comment"="► Définition : Complément d'adresse de l'utilisateur (N° appartement, étage, couloir, escalier...) ► Règles de gestion : Utilisation d'un outil d'autocomplétion de l'adresse -> Choix de son adresse dans une liste déroulante sous la forme ""NUMERO ADRESSE COMPLEMENT, CP, VILLE, PAYS"})
     */
    private $userComplement;

    /**
     * @var string|null
     *
     * @ORM\Column(name="user_city", type="string", length=100, nullable=true, options={"comment"="► Définition : Ville de l'utilisateur ► Règles de gestion : Utilisation d'un outil d'autocomplétion de l'adresse -> Choix de son adresse dans une liste déroulante sous la forme ""NUMERO ADRESSE COMPLEMENT, CP, VILLE, PAYS"})
     */
    private $userCity;

    /**
     * @var string|null
     *
     * @ORM\Column(name="user_cp", type="string", length=10, nullable=true, options={"comment"="► Définition : Code postal de l'utilisateur ► Règles de gestion : Utilisation d'un outil d'autocomplétion de l'adresse -> Choix de son adresse dans une liste déroulante sous la forme ""NUMERO ADRESSE COMPLEMENT, CP, VILLE, PAYS"})
     */
    private $userCp;

    /**
     * @var string|null
     *
     * @ORM\Column(name="user_country", type="string", length=20, nullable=true, options={"comment"="► Définition : Pays de l'utilisateur ► Règles de gestion : Utilisation d'un outil d'autocomplétion de l'adresse -> Choix de son adresse dans une liste déroulante sous la forme ""NUMERO ADRESSE COMPLEMENT, CP, VILLE, PAYS"})
     */
    private $userCountry;

    /**
     * @var string|null
     *
     * @ORM\Column(name="user_photo", type="blob", length=16777215, nullable=true, options={"comment"="► Définition : Photo de profil de l'utilisateur ► Règles de gestion : L'image est récupérée via l'authentification oauth2 LinkedIn sous la forme d'un lien, Utilisation de la fonction ""fil_get_contents"" de php pour stocker l'image, Utilisation de la fonction ""base64_encode"" de php pour afficher l'image"})
     */
    private $userPhoto;

    /**
     * @var string|null
     *
     * @ORM\Column(name="user_role", type="string", length=45, nullable=true)
     */
    private $userRole;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="user_last_update", type="datetime", nullable=false)
     */
    private $userLastUpdate;

    public function getUserEmail(): ?string
    {
        return $this->userEmail;
    }

    public function setUserEmail(string $userEmail): self
    {
        $this->userEmail = $userEmail;

        return $this;
    }

    public function getUserFirstname(): ?string
    {
        return $this->userFirstname;
    }

    public function setUserFirstname(string $userFirstname): self
    {
        $this->userFirstname = $userFirstname;

        return $this;
    }

    public function getUserLastname(): ?string
    {
        return $this->userLastname;
    }

    public function setUserLastname(string $userLastname): self
    {
        $this->userLastname = $userLastname;

        return $this;
    }

    public function getUserMobile(): ?string
    {
        return $this->userMobile;
    }

    public function setUserMobile(string $userMobile): self
    {
        $this->userMobile = $userMobile;

        return $this;
    }

    public function getUserPhone(): ?string
    {
        return $this->userPhone;
    }

    public function setUserPhone(?string $userPhone): self
    {
        $this->userPhone = $userPhone;

        return $this;
    }

    public function getUserStreet(): ?string
    {
        return $this->userStreet;
    }

    public function setUserStreet(?string $userStreet): self
    {
        $this->userStreet = $userStreet;

        return $this;
    }

    public function getUserComplement(): ?string
    {
        return $this->userComplement;
    }

    public function setUserComplement(?string $userComplement): self
    {
        $this->userComplement = $userComplement;

        return $this;
    }

    public function getUserCity(): ?string
    {
        return $this->userCity;
    }

    public function setUserCity(?string $userCity): self
    {
        $this->userCity = $userCity;

        return $this;
    }

    public function getUserCp(): ?string
    {
        return $this->userCp;
    }

    public function setUserCp(?string $userCp): self
    {
        $this->userCp = $userCp;

        return $this;
    }

    public function getUserCountry(): ?string
    {
        return $this->userCountry;
    }

    public function setUserCountry(?string $userCountry): self
    {
        $this->userCountry = $userCountry;

        return $this;
    }

    public function getUserPhoto()
    {
        return $this->userPhoto;
    }

    public function setUserPhoto($userPhoto): self
    {
        $this->userPhoto = $userPhoto;

        return $this;
    }

    public function getUserRole(): ?string
    {
        return $this->userRole;
    }

    public function setUserRole(?string $userRole): self
    {
        $this->userRole = $userRole;

        return $this;
    }

    public function getUserLastUpdate(): ?\DateTimeInterface
    {
        return $this->userLastUpdate;
    }

    public function setUserLastUpdate(\DateTimeInterface $userLastUpdate): self
    {
        $this->userLastUpdate = $userLastUpdate;

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
        $userRole = [];
        if ($this->userRole != NULL) {
            $userRole[] = $this->userRole;
        };
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_ANONYMOUS';

        return array_unique($userRole);
    }

    public function setRoles(?string $userRole): self
    {
        $this->userRole = $userRole;

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
        return $this->userEmail;
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


}
