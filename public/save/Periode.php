<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Periode
 *
 * @ORM\Table(name="periode", indexes={@ORM\Index(name="fk_periode_mission", columns={"fk_periode_mission"})})
 * @ORM\Entity(repositoryClass="App\Repository\PeriodeRepository")
 */
class Periode
{
    /**
     * @var int
     *
     * @ORM\Column(name="periode_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $periodeId;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="periode_debut", type="date", nullable=true)
     */
    private $periodeDebut;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="periode_fin", type="date", nullable=true)
     */
    private $periodeFin;

    /**
     * @var \Mission
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Mission")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_periode_mission", referencedColumnName="mission_id")
     * })
     */
    private $fkPeriodeMission;

    public function getPeriodeId(): ?int
    {
        return $this->periodeId;
    }

    public function getPeriodeDebut(): ?\DateTimeInterface
    {
        return $this->periodeDebut;
    }

    public function setPeriodeDebut(?\DateTimeInterface $periodeDebut): self
    {
        $this->periodeDebut = $periodeDebut;

        return $this;
    }

    public function getPeriodeFin(): ?\DateTimeInterface
    {
        return $this->periodeFin;
    }

    public function setPeriodeFin(?\DateTimeInterface $periodeFin): self
    {
        $this->periodeFin = $periodeFin;

        return $this;
    }

    public function getFkPeriodeMission(): ?Mission
    {
        return $this->fkPeriodeMission;
    }

    public function setFkPeriodeMission(?Mission $fkPeriodeMission): self
    {
        $this->fkPeriodeMission = $fkPeriodeMission;

        return $this;
    }


}
