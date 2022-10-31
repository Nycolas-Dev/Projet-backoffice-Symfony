<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Candidateeducationals
 *
 * @ORM\Table(name="CandidateEducationals", uniqueConstraints={@ORM\UniqueConstraint(name="CandidateEducationalD", columns={"CandidateEducationalID", "CandidateID"})}, indexes={@ORM\Index(name="CandidateID", columns={"CandidateID"})})
 * @ORM\Entity(repositoryClass="App\Repository\CandidateeducationalsRepository")
 */
class Candidateeducationals
{
    /**
     * @var string
     *
     * @ORM\Column(name="CandidateEducationalID", type="string", length=20, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $candidateeducationalid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CandidateEducationalInstitute", type="string", length=200, nullable=true)
     */
    private $candidateeducationalinstitute;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CandidateEducationalDepartment", type="string", length=200, nullable=true)
     */
    private $candidateeducationaldepartment;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CandidateEducationalDegree", type="string", length=200, nullable=true)
     */
    private $candidateeducationaldegree;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="CandidateEducationalDurationFrom", type="date", nullable=true)
     */
    private $candidateeducationaldurationfrom;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="CandidateEducationalDurationTo", type="date", nullable=true)
     */
    private $candidateeducationaldurationto;

    /**
     * @var string
     *
     * @ORM\Column(name="CandidateID", type="string", length=20, nullable=false)
     */
    private $candidateid;

    public function getCandidateeducationalid(): ?string
    {
        return $this->candidateeducationalid;
    }

    public function getCandidateeducationalinstitute(): ?string
    {
        return $this->candidateeducationalinstitute;
    }

    public function setCandidateeducationalinstitute(?string $candidateeducationalinstitute): self
    {
        $this->candidateeducationalinstitute = $candidateeducationalinstitute;

        return $this;
    }

    public function getCandidateeducationaldepartment(): ?string
    {
        return $this->candidateeducationaldepartment;
    }

    public function setCandidateeducationaldepartment(?string $candidateeducationaldepartment): self
    {
        $this->candidateeducationaldepartment = $candidateeducationaldepartment;

        return $this;
    }

    public function getCandidateeducationaldegree(): ?string
    {
        return $this->candidateeducationaldegree;
    }

    public function setCandidateeducationaldegree(?string $candidateeducationaldegree): self
    {
        $this->candidateeducationaldegree = $candidateeducationaldegree;

        return $this;
    }

    public function getCandidateeducationaldurationfrom(): ?\DateTimeInterface
    {
        return $this->candidateeducationaldurationfrom;
    }

    public function setCandidateeducationaldurationfrom(?\DateTimeInterface $candidateeducationaldurationfrom): self
    {
        $this->candidateeducationaldurationfrom = $candidateeducationaldurationfrom;

        return $this;
    }

    public function getCandidateeducationaldurationto(): ?\DateTimeInterface
    {
        return $this->candidateeducationaldurationto;
    }

    public function setCandidateeducationaldurationto(?\DateTimeInterface $candidateeducationaldurationto): self
    {
        $this->candidateeducationaldurationto = $candidateeducationaldurationto;

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


}
