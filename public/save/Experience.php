<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Experience
 *
 * @ORM\Table(name="experience", indexes={@ORM\Index(name="fk_experience_portfolio", columns={"fk_experience_portfolio"})})
 * @ORM\Entity(repositoryClass="App\Repository\ExperienceRepository")
 */
class Experience
{
    /**
     * @var int
     *
     * @ORM\Column(name="experience_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $experienceId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="experience_societe", type="string", length=45, nullable=true)
     */
    private $experienceSociete;

    /**
     * @var string|null
     *
     * @ORM\Column(name="experience_activite", type="string", length=45, nullable=true)
     */
    private $experienceActivite;

    /**
     * @var int|null
     *
     * @ORM\Column(name="experience_nb_salarie", type="integer", nullable=true)
     */
    private $experienceNbSalarie;

    /**
     * @var int|null
     *
     * @ORM\Column(name="experience_budget", type="integer", nullable=true)
     */
    private $experienceBudget;

    /**
     * @var string|null
     *
     * @ORM\Column(name="experience_poste_occupe", type="string", length=45, nullable=true)
     */
    private $experiencePosteOccupe;

    /**
     * @var string|null
     *
     * @ORM\Column(name="experience_description", type="string", length=255, nullable=true)
     */
    private $experienceDescription;

    /**
     * @var \Portfolio
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Portfolio")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_experience_portfolio", referencedColumnName="portfolio_id")
     * })
     */
    private $fkExperiencePortfolio;

    public function getExperienceId(): ?int
    {
        return $this->experienceId;
    }

    public function getExperienceSociete(): ?string
    {
        return $this->experienceSociete;
    }

    public function setExperienceSociete(?string $experienceSociete): self
    {
        $this->experienceSociete = $experienceSociete;

        return $this;
    }

    public function getExperienceActivite(): ?string
    {
        return $this->experienceActivite;
    }

    public function setExperienceActivite(?string $experienceActivite): self
    {
        $this->experienceActivite = $experienceActivite;

        return $this;
    }

    public function getExperienceNbSalarie(): ?int
    {
        return $this->experienceNbSalarie;
    }

    public function setExperienceNbSalarie(?int $experienceNbSalarie): self
    {
        $this->experienceNbSalarie = $experienceNbSalarie;

        return $this;
    }

    public function getExperienceBudget(): ?int
    {
        return $this->experienceBudget;
    }

    public function setExperienceBudget(?int $experienceBudget): self
    {
        $this->experienceBudget = $experienceBudget;

        return $this;
    }

    public function getExperiencePosteOccupe(): ?string
    {
        return $this->experiencePosteOccupe;
    }

    public function setExperiencePosteOccupe(?string $experiencePosteOccupe): self
    {
        $this->experiencePosteOccupe = $experiencePosteOccupe;

        return $this;
    }

    public function getExperienceDescription(): ?string
    {
        return $this->experienceDescription;
    }

    public function setExperienceDescription(?string $experienceDescription): self
    {
        $this->experienceDescription = $experienceDescription;

        return $this;
    }

    public function getFkExperiencePortfolio(): ?Portfolio
    {
        return $this->fkExperiencePortfolio;
    }

    public function setFkExperiencePortfolio(?Portfolio $fkExperiencePortfolio): self
    {
        $this->fkExperiencePortfolio = $fkExperiencePortfolio;

        return $this;
    }


}
