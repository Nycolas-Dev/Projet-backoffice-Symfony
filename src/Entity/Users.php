<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Users
 *
 * @ORM\Table(name="Users")
 * @ORM\Entity(repositoryClass="App\Repository\UsersRepository")
 */
class Users implements UserInterface
{
    /**
     * @var string
     *
     * @ORM\Column(name="UserEmail", type="string", length=150, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $useremail;

    /**
     * @var string|null
     *
     * @ORM\Column(name="UserPassword", type="string", length=32, nullable=true)
     */
    private $userpassword;

    /**
     * @var string|null
     *
     * @ORM\Column(name="UserFirstName", type="string", length=100, nullable=true)
     * @Assert\NotBlank(message="Merci de renseigner votre prénom.")
     */
    private $userfirstname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="UserLastName", type="string", length=100, nullable=true)
     * @Assert\NotBlank(message="Merci de renseigner votre nom")
     */
    private $userlastname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="UserSalutation", type="string", length=10, nullable=true)
     */
    private $usersalutation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="UserMobile", type="string", length=20, nullable=true)
     * @Assert\Regex(
     * pattern="#^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[1-9](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$#",
     * message="Numéro mobile : Format invalide (0X XX XX XX XX)",
     * )
     * @Assert\NotBlank(message="Merci de renseigner votre mobile")
     */
    private $usermobile;

    /**
     * @var string|null
     *
     * @ORM\Column(name="UserTelephone", type="string", length=20, nullable=true) 
     * @Assert\Regex(
     * pattern="#^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[1-9](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$#",
     * message="Numéro de téléphone : Format invalide (0X XX XX XX XX)",
     * )     
     */
    private $usertelephone;

    /**
     * @var string|null
     *
     * @ORM\Column(name="UserStreet", type="string", length=250, nullable=true)
     */
    private $userstreet;

    /**
     * @var string|null
     *
     * @ORM\Column(name="UserComplement", type="string", length=250, nullable=true)
     */
    private $usercomplement;

    /**
     * @var string|null
     *
     * @ORM\Column(name="UserCity", type="string", length=100, nullable=true)
     * 
     */
    private $usercity;

    /**
     * @var string|null
     *
     * @ORM\Column(name="UserCP", type="string", length=10, nullable=true)
     */
    private $usercp;

    /**
     * @var string
     *
     * @ORM\Column(name="UserState", type="string", length=200, nullable=false)
     */
    private $userstate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="UserCountry", type="string", length=20, nullable=true)
     */
    private $usercountry;

    /**
     * @var string|null
     *
     * @ORM\Column(name="UserPhoto", type="blob", length=16777215, nullable=true)
     */
    private $userphoto;

    private $rawphoto;

    /**
     * @var string|null
     *
     * @ORM\Column(name="UserOptOut", type="string", length=10, nullable=true)
     */
    private $useroptout;

    /**
     * @var string|null
     *
     * @ORM\Column(name="UserOptInStatus", type="string", length=100, nullable=true)
     */
    private $useroptinstatus;

    /**
     * @var string|null
     *
     * @ORM\Column(name="UserOptInMode", type="string", length=100, nullable=true)
     */
    private $useroptinmode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="UserOptInDate", type="string", length=100, nullable=true)
     */
    private $useroptindate;

    /**
     * @var string
     *
     * @ORM\Column(name="UserRole", type="string", length=100, nullable=false, options={"default"="ROLE_USER"})
     */
    private $userrole = 'ROLE_USER';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="UserLastUpdate", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $userlastupdate = 'CURRENT_TIMESTAMP';

    public function getUseremail(): ?string
    {
        return $this->useremail;
    }

    public function getUserpassword(): ?string
    {
        return $this->userpassword;
    }

    public function setUserpassword(?string $userpassword): self
    {
        $this->userpassword = $userpassword;

        return $this;
    }

    public function getUserfirstname(): ?string
    {
        return $this->userfirstname;
    }

    public function setUserfirstname(?string $userfirstname): self
    {
        $this->userfirstname = $userfirstname;

        return $this;
    }

    public function getUserlastname(): ?string
    {
        return $this->userlastname;
    }

    public function setUserlastname(?string $userlastname): self
    {
        $this->userlastname = $userlastname;

        return $this;
    }

    public function getUsersalutation(): ?string
    {
        return $this->usersalutation;
    }

    public function setUsersalutation(?string $usersalutation): self
    {
        $this->usersalutation = $usersalutation;

        return $this;
    }

    public function getUsermobile(): ?string
    {
        return $this->usermobile;
    }

    public function setUsermobile(?string $usermobile): self
    {
        $this->usermobile = $usermobile;

        return $this;
    }

    public function getUsertelephone(): ?string
    {
        return $this->usertelephone;
    }

    public function setUsertelephone(?string $usertelephone): self
    {
        $this->usertelephone = $usertelephone;

        return $this;
    }

    public function getUserstreet(): ?string
    {
        return $this->userstreet;
    }

    public function setUserstreet(?string $userstreet): self
    {
        $this->userstreet = $userstreet;

        return $this;
    }

    public function getUsercomplement(): ?string
    {
        return $this->usercomplement;
    }

    public function setUsercomplement(?string $usercomplement): self
    {
        $this->usercomplement = $usercomplement;

        return $this;
    }

    public function getUsercity(): ?string
    {
        return $this->usercity;
    }

    public function setUsercity(?string $usercity): self
    {
        $this->usercity = $usercity;

        return $this;
    }

    public function getUsercp(): ?string
    {
        return $this->usercp;
    }

    public function setUsercp(?string $usercp): self
    {
        $this->usercp = $usercp;

        return $this;
    }

    public function getUserstate(): ?string
    {
        return $this->userstate;
    }

    public function setUserstate(string $userstate): self
    {
        $this->userstate = $userstate;

        return $this;
    }

    public function getUsercountry(): ?string
    {
        return $this->usercountry;
    }

    public function setUsercountry(?string $usercountry): self
    {
        $this->usercountry = $usercountry;

        return $this;
    }

    public function getUserphoto()
    {
        return $this->userphoto;
    }

    public function setUserphoto($userphoto): self
    {
        $this->userphoto = $userphoto;

        return $this;
    }

    public function getUseroptout(): ?string
    {
        return $this->useroptout;
    }

    public function setUseroptout(?string $useroptout): self
    {
        $this->useroptout = $useroptout;

        return $this;
    }

    public function getUseroptinstatus(): ?string
    {
        return $this->useroptinstatus;
    }

    public function setUseroptinstatus(?string $useroptinstatus): self
    {
        $this->useroptinstatus = $useroptinstatus;

        return $this;
    }

    public function getUseroptinmode(): ?string
    {
        return $this->useroptinmode;
    }

    public function setUseroptinmode(?string $useroptinmode): self
    {
        $this->useroptinmode = $useroptinmode;

        return $this;
    }

    public function getUseroptindate(): ?string
    {
        return $this->useroptindate;
    }

    public function setUseroptindate(?string $useroptindate): self
    {
        $this->useroptindate = $useroptindate;

        return $this;
    }

    // public function getUserrole(): ?string
    // {
    //     return $this->userrole;
    // }

    // public function setUserrole(string $userrole): self
    // {
    //     $this->userrole = $userrole;

    //     return $this;
    // }

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
        $userrole = [];
        if ($this->userrole != NULL) {

           $userrole[] = $this->userrole;
        };
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_ANONYMOUS';

        return array_unique($userrole);
    }

    public function setRoles(?string $userrole): self
    {
        $this->userrole = $userrole;

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
        return $this->useremail;
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
    
    /**
    * String representation of object
    * @link https://php.net/manual/en/serializable.serialize.php
    * @return string the string representation of the object or null
    * @since 5.1.0
    */
    public function serialize()
    {
        return serialize(array(
            $this->useremail,
            $this->userfirstname,
            $this->userlastname,
            $this->usersalutation,
            $this->usermobile,
            $this->userphone,
            $this->userstreet,
            $this->usercomplement,
            $this->usercity,
            $this->usercp,
            $this->userstate,
            $this->usercountry,
            $this->userlastUpdate,
            $this->userrole,
        ));
    }

    /**
    * Constructs the object
    * @link https://php.net/manual/en/serializable.unserialize.php
    * @param string $serialized <p>
    * The string representation of the object.
    * </p>
    * @return void
    * @since 5.1.0
    */
    public function unserialize($serialized)
    {
        list (
            $this->useremail,
            $this->userfirstname,
            $this->userlastname,
            $this->usersalutation,
            $this->usermobile,
            $this->userphone,
            $this->userstreet,
            $this->usercomplement,
            $this->usercity,
            $this->usercp,
            $this->userstate,
            $this->usercountry,
            $this->userlastUpdate,
            $this->userrole,
            ) = unserialize($serialized, array('allowed_classes' => false));
    }

    public function getUserlastupdate(): ?\DateTimeInterface
    {
        return $this->userlastupdate;
    }

    public function setUserlastupdate(\DateTimeInterface $userlastupdate): self
    {
        $this->userlastupdate = $userlastupdate;

        return $this;
    }

    public function displayPhoto()
    {
        if($this->getUserPhoto() === null) {
            
        }
        else {
            if(null === $this->rawphoto) {
                     $this->rawphoto = "data:image/png;base64," . base64_encode(stream_get_contents($this->getUserPhoto()));
         }
    }
 
       return $this->rawphoto;

    }


}
