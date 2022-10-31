<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Candidatejobopenings
 *
 * @ORM\Table(name="CandidateJobOpenings", indexes={@ORM\Index(name="CandidateID", columns={"CandidateID"}), @ORM\Index(name="JobOpeningID", columns={"JobOpeningID"})})
 * @ORM\Entity(repositoryClass="App\Repository\CandidatejobopeningsRepository")
 */
class Candidatejobopenings
{
    /**
     * @var string
     *
     * @ORM\Column(name="CandidateID", type="string", length=20, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $candidateid;

    /**
     * @var string
     *
     * @ORM\Column(name="JobOpeningID", type="string", length=20, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $jobopeningid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CandidateJobOpeningsStatus", type="string", length=100, nullable=true)
     */
    private $candidatejobopeningsstatus;

    public function getCandidateid(): ?string
    {
        return $this->candidateid;
    }

    public function getJobopeningid(): ?string
    {
        return $this->jobopeningid;
    }

    public function getCandidatejobopeningsstatus(): ?string
    {
        return $this->candidatejobopeningsstatus;
    }

    public function setCandidatejobopeningsstatus(?string $candidatejobopeningsstatus): self
    {
        $this->candidatejobopeningsstatus = $candidatejobopeningsstatus;

        return $this;
    }


}
