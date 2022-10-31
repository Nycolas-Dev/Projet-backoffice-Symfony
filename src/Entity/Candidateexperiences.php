<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

/**
 * Candidateexperiences
 *
 * @ORM\Table(name="CandidateExperiences", uniqueConstraints={@ORM\UniqueConstraint(name="CandidateEducationalD", columns={"CandidateExperienceID", "CandidateID"})}, indexes={@ORM\Index(name="CandidateID", columns={"CandidateID"})})
 * @ORM\Entity(repositoryClass="App\Repository\CandidateexperiencesRepository")
 */
class Candidateexperiences implements JsonSerializable
{
    /**
     * @var string
     *
     * @ORM\Column(name="CandidateExperienceID", type="string", length=20, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $candidateexperienceid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CandidateExperienceOccupation", type="string", length=200, nullable=true)
     */
    private $candidateexperienceoccupation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CandidateExperienceCompany", type="string", length=200, nullable=true)
     */
    private $candidateexperiencecompany;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CandidateExperienceSummary", type="text", length=65535, nullable=true)
     */
    private $candidateexperiencesummary;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CandidateExperienceSecteur", type="string", length=200, nullable=true)
     */
    private $candidateexperiencesecteur;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="CandidateExperienceDurationFrom", type="date", nullable=true)
     */
    private $candidateexperiencedurationfrom;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="CandidateExperienceDurationTo", type="date", nullable=true)
     */
    private $candidateexperiencedurationto;

    /**
     * @var string
     *
     * @ORM\Column(name="CandidateID", type="string", length=20, nullable=false)
     */
    private $candidateid;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="CandidateExperienceLastUpdate", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $candidateexperiencelastupdate = 'CURRENT_TIMESTAMP';

    public function getCandidateexperienceid(): ?string
    {
        return $this->candidateexperienceid;
    }

    public function setCandidateexperienceid(?string $candidateexperienceid): self
    {
        $this->candidateexperienceid = $candidateexperienceid;

        return $this;
    }

    public function getCandidateexperienceoccupation(): ?string
    {
        return $this->candidateexperienceoccupation;
    }

    public function setCandidateexperienceoccupation(?string $candidateexperienceoccupation): self
    {
        $this->candidateexperienceoccupation = $candidateexperienceoccupation;

        return $this;
    }

    public function getCandidateexperiencecompany(): ?string
    {
        return $this->candidateexperiencecompany;
    }

    public function setCandidateexperiencecompany(?string $candidateexperiencecompany): self
    {
        $this->candidateexperiencecompany = $candidateexperiencecompany;

        return $this;
    }

    public function getCandidateexperiencesummary(): ?string
    {
        return $this->candidateexperiencesummary;
    }

    public function setCandidateexperiencesummary(?string $candidateexperiencesummary): self
    {
        $this->candidateexperiencesummary = $candidateexperiencesummary;

        return $this;
    }

    public function getCandidateexperiencesecteur(): ?string
    {
        return $this->candidateexperiencesecteur;
    }

    public function setCandidateexperiencesecteur(?string $candidateexperiencesecteur): self
    {
        $this->candidateexperiencesecteur = $candidateexperiencesecteur;

        return $this;
    }

    public function getCandidateexperiencedurationfrom(): ?\DateTimeInterface
    {
        return $this->candidateexperiencedurationfrom;
    }

    public function setCandidateexperiencedurationfrom(?\DateTimeInterface $candidateexperiencedurationfrom): self
    {
        $this->candidateexperiencedurationfrom = $candidateexperiencedurationfrom;

        return $this;
    }

    public function getCandidateexperiencedurationto(): ?\DateTimeInterface
    {
        return $this->candidateexperiencedurationto;
    }

    public function setCandidateexperiencedurationto(?\DateTimeInterface $candidateexperiencedurationto): self
    {
        $this->candidateexperiencedurationto = $candidateexperiencedurationto;

        return $this;
    }

    public function getCandidateid(): ?string
    {
        return $this->candidateid;
    }

    public function setCandidateid(string $candidateid): self
    {
        $this->candidateid = $candidateid;

        return $this;
    }

    public function getCandidateexperiencelastupdate(): ?\DateTimeInterface
    {
        return $this->candidateexperiencelastupdate;
    }

    public function setCandidateexperiencelastupdate(?\DateTimeInterface $candidateexperiencelastupdate): self
    {
        $this->candidateexperiencelastupdate = $candidateexperiencelastupdate;

        return $this;
    }

    function __construct()
    {
        $this->candidateexperiencelastupdate = new \DateTime();
    }

    public function getSimpleValues($number){
        return array(
           'candidateexperienceid'      => $this->getCandidateexperienceid(),
           'candidateexperienceoccupation'     => $this->getCandidateexperienceoccupation(),
           'candidateexperiencecompany'     => $this->getCandidateexperiencecompany(),
           'candidateexperiencesummary'    => $this->getCandidateexperiencesummary(),
           'candidateexperiencesecteur' => $this->getCandidateexperiencesecteur(),              
           'candidateexperiencedurationfrom'   => $this->getCandidateexperiencedurationfrom(),
           'candidateexperiencedurationto'    => $this->getCandidateexperiencedurationto(),
           'candidateid'  => $this->getCandidateid(),
           'number' => $number,
       );
   }

   public function jsonSerialize(){
        return array(
        'candidateexperienceid'      => $this->getCandidateexperienceid(),
        'candidateexperienceoccupation'     => $this->getCandidateexperienceoccupation(),
        'candidateexperiencecompany'     => $this->getCandidateexperiencecompany(),
        'candidateexperiencesummary'    => $this->getCandidateexperiencesummary(),
        'candidateexperiencesecteur' => $this->getCandidateexperiencesecteur(),              
        'candidateexperiencedurationfrom'   => $this->getCandidateexperiencedurationfrom(),
        'candidateexperiencedurationto'    => $this->getCandidateexperiencedurationto(),
        'candidateid'  => $this->getCandidateid(),
        'candidateexperiencelastupdate'  => $this->getCandidateexperiencelastupdate(),
        );

    }
}
