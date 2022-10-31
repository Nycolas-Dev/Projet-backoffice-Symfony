<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

/**
 * Candidateportfolios
 *
 * @ORM\Table(name="CandidatePortfolios", uniqueConstraints={@ORM\UniqueConstraint(name="CandidateEducationalD", columns={"CandidatePortfolioID", "CandidateID"})}, indexes={@ORM\Index(name="CandidateID", columns={"CandidateID"})})
 * @ORM\Entity(repositoryClass="App\Repository\CandidateportfoliosRepository")
 */
class Candidateportfolios implements JsonSerializable
{
    /**
     * @var string
     *
     * @ORM\Column(name="CandidatePortfolioID", type="string", length=20, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $candidateportfolioid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CandidatePortfolioTitre", type="string", length=250, nullable=true)
     */
    private $candidateportfoliotitre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CandidatePortfolioMissions", type="text", length=65535, nullable=true)
     */
    private $candidateportfoliomissions;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CandidatePortfolioSociete", type="string", length=200, nullable=true)
     */
    private $candidateportfoliosociete;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CandidatePortfolioSecteur", type="string", length=200, nullable=true)
     */
    private $candidateportfoliosecteur;

    /**
     * @var string|null
     *
     * @ORM\Column(name="CandidatePortfolioContexte", type="string", length=200, nullable=true)
     */
    private $candidateportfoliocontexte;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="CandidatePortfolioDurationFrom", type="date", nullable=true)
     */
    private $candidateportfoliodurationfrom;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="CandidatePortfolioDurationTo", type="date", nullable=true)
     */
    private $candidateportfoliodurationto;

    /**
     * @var string
     *
     * @ORM\Column(name="CandidateID", type="string", length=20, nullable=false)
     */
    private $candidateid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="CandidatePortfolioLastUpdate", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $candidateportfoliolastupdate;

    public function getCandidateportfolioid(): ?string
    {
        return $this->candidateportfolioid;
    }

    public function setCandidateportfolioid(?string $candidateportfolioid): self
    {
        $this->candidateportfolioid = $candidateportfolioid;

        return $this;
    }

    public function getCandidateportfoliotitre(): ?string
    {
        return $this->candidateportfoliotitre;
    }

    public function setCandidateportfoliotitre(?string $candidateportfoliotitre): self
    {
        $this->candidateportfoliotitre = $candidateportfoliotitre;

        return $this;
    }

    public function getCandidateportfoliomissions(): ?string
    {
        return $this->candidateportfoliomissions;
    }

    public function setCandidateportfoliomissions(?string $candidateportfoliomissions): self
    {
        $this->candidateportfoliomissions = $candidateportfoliomissions;

        return $this;
    }

    public function getCandidateportfoliosociete(): ?string
    {
        return $this->candidateportfoliosociete;
    }

    public function setCandidateportfoliosociete(?string $candidateportfoliosociete): self
    {
        $this->candidateportfoliosociete = $candidateportfoliosociete;

        return $this;
    }

    public function getCandidateportfoliosecteur(): ?string
    {
        return $this->candidateportfoliosecteur;
    }

    public function setCandidateportfoliosecteur(?string $candidateportfoliosecteur): self
    {
        $this->candidateportfoliosecteur = $candidateportfoliosecteur;

        return $this;
    }

    public function getCandidateportfoliocontexte(): ?string
    {
        return $this->candidateportfoliocontexte;
    }

    public function setCandidateportfoliocontexte(?string $candidateportfoliocontexte): self
    {
        $this->candidateportfoliocontexte = $candidateportfoliocontexte;

        return $this;
    }

    public function getCandidateportfoliodurationfrom(): ?\DateTimeInterface
    {
        return $this->candidateportfoliodurationfrom;
    }

    public function setCandidateportfoliodurationfrom(?\DateTimeInterface $candidateportfoliodurationfrom): self
    {
        $this->candidateportfoliodurationfrom = $candidateportfoliodurationfrom;

        return $this;
    }

    public function getCandidateportfoliodurationto(): ?\DateTimeInterface
    {
        return $this->candidateportfoliodurationto;
    }

    public function setCandidateportfoliodurationto(?\DateTimeInterface $candidateportfoliodurationto): self
    {
        $this->candidateportfoliodurationto = $candidateportfoliodurationto;

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

    public function getCandidateportfoliolastupdate(): ?\DateTimeInterface
    {
        return $this->candidateportfoliolastupdate;
    }

    public function setCandidateportfoliolastupdate(\DateTimeInterface $candidateportfoliolastupdate): self
    {
        $this->candidateportfoliolastupdate = $candidateportfoliolastupdate;

        return $this;
    }

    function __construct()
    {
        $this->candidateportfoliolastupdate = new \DateTime();
    }

    public function getSimpleValues($number){
        return array(
           'candidateportfolioid'      => $this->getCandidateportfolioid(),
           'candidateportfoliotitre'     => $this->getCandidateportfoliotitre(),
           'candidateportfoliomissions'     => $this->getCandidateportfoliomissions(),
           'candidateportfoliosociete'    => $this->getCandidateportfoliosociete(),
           'candidateportfoliosecteur' => $this->getCandidateportfoliosecteur(),              
           'candidateportfoliocontexte'   => $this->getCandidateportfoliocontexte(),
           'candidateportfoliodurationfrom'    => $this->getCandidateportfoliodurationfrom(),
           'candidateportfoliodurationto'  => $this->getCandidateportfoliodurationto(),
           'candidateid'  => $this->getCandidateid(),
           'candidateportfoliolastupdate'  => $this->getCandidateportfoliolastupdate(),
           'number' => $number,
       );
   }

   public function jsonSerialize(){
    return array(
       'candidateportfolioid'      => $this->getCandidateportfolioid(),
       'candidateportfoliotitre'     => $this->getCandidateportfoliotitre(),
       'candidateportfoliomissions'     => $this->getCandidateportfoliomissions(),
       'candidateportfoliosociete'    => $this->getCandidateportfoliosociete(),
       'candidateportfoliosecteur' => $this->getCandidateportfoliosecteur(),              
       'candidateportfoliocontexte'   => $this->getCandidateportfoliocontexte(),
       'candidateportfoliodurationfrom'    => $this->getCandidateportfoliodurationfrom(),
       'candidateportfoliodurationto'  => $this->getCandidateportfoliodurationto(),
       'candidateid'  => $this->getCandidateid(),
       'candidateportfoliolastupdate'  => $this->getCandidateportfoliolastupdate(),
   );
}

}
