<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cra
 *
 * @ORM\Table(name="cra", indexes={@ORM\Index(name="fk_cra_parteamer", columns={"fk_cra_parteamer"}), @ORM\Index(name="fk_cra_periode", columns={"fk_cra_periode"})})
 * @ORM\Entity(repositoryClass="App\Repository\CraRepository")
 */
class Cra
{
    /**
     * @var int
     *
     * @ORM\Column(name="cra_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $craId;

    /**
     * @var \Parteamer
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Parteamer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_cra_parteamer", referencedColumnName="parteamer_id")
     * })
     */
    private $fkCraParteamer;

    /**
     * @var \Periode
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Periode")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_cra_periode", referencedColumnName="periode_id")
     * })
     */
    private $fkCraPeriode;

    public function getCraId(): ?int
    {
        return $this->craId;
    }

    public function getFkCraParteamer(): ?Parteamer
    {
        return $this->fkCraParteamer;
    }

    public function setFkCraParteamer(?Parteamer $fkCraParteamer): self
    {
        $this->fkCraParteamer = $fkCraParteamer;

        return $this;
    }

    public function getFkCraPeriode(): ?Periode
    {
        return $this->fkCraPeriode;
    }

    public function setFkCraPeriode(?Periode $fkCraPeriode): self
    {
        $this->fkCraPeriode = $fkCraPeriode;

        return $this;
    }


}
