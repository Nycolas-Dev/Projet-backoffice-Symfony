<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Portfolio
 *
 * @ORM\Table(name="portfolio", indexes={@ORM\Index(name="fk_portfolio_parteamer", columns={"fk_portfolio_parteamer"})})
 * @ORM\Entity(repositoryClass="App\Repository\PortfolioRepository")
 */
class Portfolio
{
    /**
     * @var int
     *
     * @ORM\Column(name="portfolio_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $portfolioId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="portfolio_nom", type="string", length=45, nullable=true)
     */
    private $portfolioNom;

    /**
     * @var int|null
     *
     * @ORM\Column(name="portfolio_version", type="integer", nullable=true)
     */
    private $portfolioVersion;

    /**
     * @var string|null
     *
     * @ORM\Column(name="portfolio_diplome", type="string", length=45, nullable=true)
     */
    private $portfolioDiplome;

    /**
     * @var string|null
     *
     * @ORM\Column(name="portfolio_formation", type="string", length=45, nullable=true)
     */
    private $portfolioFormation;

    /**
     * @var string|null
     *
     * @ORM\Column(name="portfolio_domaines_expertises", type="string", length=255, nullable=true)
     */
    private $portfolioDomainesExpertises;

    /**
     * @var string|null
     *
     * @ORM\Column(name="portfolio_environnement", type="string", length=45, nullable=true)
     */
    private $portfolioEnvironnement;

    /**
     * @var \Parteamer
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Parteamer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_portfolio_parteamer", referencedColumnName="parteamer_id")
     * })
     */
    private $fkPortfolioParteamer;

    public function getPortfolioId(): ?int
    {
        return $this->portfolioId;
    }

    public function getPortfolioNom(): ?string
    {
        return $this->portfolioNom;
    }

    public function setPortfolioNom(?string $portfolioNom): self
    {
        $this->portfolioNom = $portfolioNom;

        return $this;
    }

    public function getPortfolioVersion(): ?int
    {
        return $this->portfolioVersion;
    }

    public function setPortfolioVersion(?int $portfolioVersion): self
    {
        $this->portfolioVersion = $portfolioVersion;

        return $this;
    }

    public function getPortfolioDiplome(): ?string
    {
        return $this->portfolioDiplome;
    }

    public function setPortfolioDiplome(?string $portfolioDiplome): self
    {
        $this->portfolioDiplome = $portfolioDiplome;

        return $this;
    }

    public function getPortfolioFormation(): ?string
    {
        return $this->portfolioFormation;
    }

    public function setPortfolioFormation(?string $portfolioFormation): self
    {
        $this->portfolioFormation = $portfolioFormation;

        return $this;
    }

    public function getPortfolioDomainesExpertises(): ?string
    {
        return $this->portfolioDomainesExpertises;
    }

    public function setPortfolioDomainesExpertises(?string $portfolioDomainesExpertises): self
    {
        $this->portfolioDomainesExpertises = $portfolioDomainesExpertises;

        return $this;
    }

    public function getPortfolioEnvironnement(): ?string
    {
        return $this->portfolioEnvironnement;
    }

    public function setPortfolioEnvironnement(?string $portfolioEnvironnement): self
    {
        $this->portfolioEnvironnement = $portfolioEnvironnement;

        return $this;
    }

    public function getFkPortfolioParteamer(): ?Parteamer
    {
        return $this->fkPortfolioParteamer;
    }

    public function setFkPortfolioParteamer(?Parteamer $fkPortfolioParteamer): self
    {
        $this->fkPortfolioParteamer = $fkPortfolioParteamer;

        return $this;
    }


}
