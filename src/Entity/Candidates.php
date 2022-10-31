<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Candidates
 *
 * @ORM\Table(name="Candidates", uniqueConstraints={@ORM\UniqueConstraint(name="CandidateUserEmail", columns={"CandidateUserEmail"})}, indexes={@ORM\Index(name="UserStatus", columns={"CandidateCercle"})})
 * @ORM\Entity(repositoryClass="App\Repository\CandidatesRepository")
 */
class Candidates
{
    /**
     * @var string
     *
     * @ORM\Column(name="CandidateID", type="string", length=20, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $candidateid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CandidateStatus", type="string", length=100, nullable=true)
     */
    private $candidatestatus;

    /**
     * @var string
     *
     * @ORM\Column(name="CandidateUserEmail", type="string", length=150, nullable=false)
     */
    private $candidateuseremail;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CandidateResume", type="text", length=65535, nullable=true)
     */
    private $candidateresume;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CandidateQualification", type="string", length=100, nullable=true)
     */
    private $candidatequalification;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CandidateExperience", type="string", length=15, nullable=true)
     */
    private $candidateexperience;

    /**
     * @var int|null
     *
     * @ORM\Column(name="CandidateCJM", type="integer", nullable=true)
     */
    private $candidatecjm;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CandidatePreferences", type="string", length=250, nullable=true)
     */
    private $candidatepreferences;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CandidateTags", type="string", length=250, nullable=true)
     */
    private $candidatetags;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CandidateDayMove", type="string", length=100, nullable=true)
     */
    private $candidatedaymove;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CandidateWeekMove", type="string", length=100, nullable=true)
     */
    private $candidateweekmove;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CandidateWMobility", type="string", length=100, nullable=true)
     */
    private $candidatewmobility;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CandidateAvailability", type="string", length=20, nullable=true)
     */
    private $candidateavailability;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="CandidateAvailabilityDate", type="date", nullable=true)
     */
    private $candidateavailabilitydate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CandidateExpertise", type="string", length=250, nullable=true)
     */
    private $candidateexpertise;

    /**
     * @var string
     *
     * @ORM\Column(name="CandidateFonction", type="string", length=200, nullable=false)
     */
    private $candidatefonction;

    /**
     * @var string
     *
     * @ORM\Column(name="CandidateMetier", type="string", length=200, nullable=true)
     */
    private $candidatemetier;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CandidateCercle", type="string", length=1, nullable=true)
     */
    private $candidatecercle;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CandidateInfos", type="text", length=65535, nullable=true)
     */
    private $candidateinfos;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="CandidateLastUpdate", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $candidatelastupdate = 'CURRENT_TIMESTAMP';

    public function getCandidateid(): ?string
    {
        return $this->candidateid;
    }

    public function getCandidatestatus(): ?string
    {
        return $this->candidatestatus;
    }

    public function setCandidatestatus(?string $candidatestatus): self
    {
        $this->candidatestatus = $candidatestatus;

        return $this;
    }

    public function getCandidateuseremail(): ?string
    {
        return $this->candidateuseremail;
    }

    public function setCandidateuseremail(string $candidateuseremail): self
    {
        $this->candidateuseremail = $candidateuseremail;

        return $this;
    }

    public function getCandidateresume(): ?string
    {
        return $this->candidateresume;
    }

    public function setCandidateresume(?string $candidateresume): self
    {
        $this->candidateresume = $candidateresume;

        return $this;
    }

    public function getCandidatequalification(): ?string
    {
        return $this->candidatequalification;
    }

    public function setCandidatequalification(?string $candidatequalification): self
    {
        $this->candidatequalification = $candidatequalification;

        return $this;
    }

    public function getCandidateexperience(): ?string
    {
        return $this->candidateexperience;
    }

    public function setCandidateexperience(?string $candidateexperience): self
    {
        $this->candidateexperience = $candidateexperience;

        return $this;
    }

    public function getCandidatecjm(): ?int
    {
        return $this->candidatecjm;
    }

    public function setCandidatecjm(?int $candidatecjm): self
    {
        $this->candidatecjm = $candidatecjm;

        return $this;
    }

    public function getCandidatepreferences(): ?string
    {
        return $this->candidatepreferences;
    }

    public function setCandidatepreferences(?string $candidatepreferences): self
    {
        $this->candidatepreferences = $candidatepreferences;

        return $this;
    }

    public function getCandidatetags(): ?string
    {
        return $this->candidatetags;
    }

    public function setCandidatetags(?string $candidatetags): self
    {
        $this->candidatetags = $candidatetags;

        return $this;
    }

    public function getCandidatedaymove(): ?string
    {
        return $this->candidatedaymove;
    }

    public function setCandidatedaymove(?string $candidatedaymove): self
    {
        $this->candidatedaymove = $candidatedaymove;

        return $this;
    }

    public function getCandidateweekmove(): ?string
    {
        return $this->candidateweekmove;
    }

    public function setCandidateweekmove(?string $candidateweekmove): self
    {
        $this->candidateweekmove = $candidateweekmove;

        return $this;
    }

    public function getCandidatewmobility(): ?string
    {
        return $this->candidatewmobility;
    }

    public function setCandidatewmobility(?string $candidatewmobility): self
    {
        $this->candidatewmobility = $candidatewmobility;

        return $this;
    }

    public function getCandidateavailability(): ?string
    {
        return $this->candidateavailability;
    }

    public function setCandidateavailability(?string $candidateavailability): self
    {
        $this->candidateavailability = $candidateavailability;

        return $this;
    }

    public function getCandidateavailabilitydate(): ?\DateTimeInterface
    {
        return $this->candidateavailabilitydate;
    }

    public function setCandidateavailabilitydate(?\DateTimeInterface $candidateavailabilitydate): self
    {
        $this->candidateavailabilitydate = $candidateavailabilitydate;

        return $this;
    }

    public function getCandidateexpertise(): ?string
    {
        return $this->candidateexpertise;
    }

    public function setCandidateexpertise(?string $candidateexpertise): self
    {
        $this->candidateexpertise = $candidateexpertise;

        return $this;
    }

    
    public function getCandidatemetier(): ?string
    {
        return $this->candidatemetier;
    }

    public function setCandidatemetier(?string $candidatemetier): self
    {
        $this->candidatemetier = $candidatemetier;

        return $this;
    }

    public function getCandidatefonction(): ?string
    {
        return $this->candidatefonction;
    }

    public function setCandidatefonction(string $candidatefonction): self
    {
        $this->candidatefonction = $candidatefonction;

        return $this;
    }

    public function getCandidatecercle(): ?string
    {
        return $this->candidatecercle;
    }

    public function setCandidatecercle(?string $candidatecercle): self
    {
        $this->candidatecercle = $candidatecercle;

        return $this;
    }

    public function getCandidateinfos(): ?string
    {
        return $this->candidateinfos;
    }

    public function setCandidateinfos(?string $candidateinfos): self
    {
        $this->candidateinfos = $candidateinfos;

        return $this;
    }

    public function getCandidatelastupdate(): ?\DateTimeInterface
    {
        return $this->candidatelastupdate;
    }

    public function setCandidatelastupdate(\DateTimeInterface $candidatelastupdate): self
    {
        $this->candidatelastupdate = $candidatelastupdate;

        return $this;
    }
    

    // /**
    // * String representation of object
    // * @link https://php.net/manual/en/serializable.serialize.php
    // * @return string the string representation of the object or null
    // * @since 5.1.0
    // */
    // public function serialize()
    // {
    //     return serialize(array(
    //         $this->candidateid,
    //         $this->candidatestatus,
    //         $this->candidateuseremail,
    //         $this->candidateresume,
    //         $this->candidatequalification,
    //         $this->candidateexperience,
    //         $this->candidatecjm,
    //         $this->candidatetags,
    //         $this->candidatedaymove,
    //         $this->candidateweekmove,
    //         $this->candidateavailability,
    //         $this->candidateavailabilitydate,
    //         $this->candidateexpertise,
    //         $this->candidatefonction,
    //         $this->candidatecercle,
    //         $this->candidateinfos,
    //     ));
    // }

    // /**
    // * Constructs the object
    // * @link https://php.net/manual/en/serializable.unserialize.php
    // * @param string $serialized <p>
    // * The string representation of the object.
    // * </p>
    // * @return void
    // * @since 5.1.0
    // */
    // public function unserialize($serialized)
    // {
    //     list (
    //         $this->candidateid,
    //         $this->candidatestatus,
    //         $this->candidateuseremail,
    //         $this->candidateresume,
    //         $this->candidatequalification,
    //         $this->candidateexperience,
    //         $this->candidatecjm,
    //         $this->candidatetags,
    //         $this->candidatedaymove,
    //         $this->candidateweekmove,
    //         $this->candidateavailability,
    //         $this->candidateavailabilitydate,
    //         $this->candidateexpertise,
    //         $this->candidatefonction,
    //         $this->candidatecercle,
    //         $this->candidateinfos,
    //         ) = unserialize($serialized, array('allowed_classes' => false));
    // }


}
