<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Facture
 *
 * @ORM\Table(name="facture", indexes={@ORM\Index(name="fk_facture_periode", columns={"fk_facture_periode"}), @ORM\Index(name="fk_facture_type", columns={"fk_facture_type"})})
 * @ORM\Entity(repositoryClass="App\Repository\FactureRepository")
 */
class Facture
{
    /**
     * @var int
     *
     * @ORM\Column(name="facture_numero", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $factureNumero;

    /**
     * @var int|null
     *
     * @ORM\Column(name="facture_montant", type="integer", nullable=true)
     */
    private $factureMontant;

    /**
     * @var int|null
     *
     * @ORM\Column(name="facture_cjm", type="integer", nullable=true)
     */
    private $factureCjm;

    /**
     * @var int|null
     *
     * @ORM\Column(name="facture_tjm", type="integer", nullable=true)
     */
    private $factureTjm;

    /**
     * @var \Periode
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Periode")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_facture_periode", referencedColumnName="periode_id")
     * })
     */
    private $fkFacturePeriode;

    /**
     * @var \TypeFacture
     *
     * @ORM\ManyToOne(targetEntity="TypeFacture")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_facture_type", referencedColumnName="type_facture_id")
     * })
     */
    private $fkFactureType;

    public function getFactureNumero(): ?int
    {
        return $this->factureNumero;
    }

    public function getFactureMontant(): ?int
    {
        return $this->factureMontant;
    }

    public function setFactureMontant(?int $factureMontant): self
    {
        $this->factureMontant = $factureMontant;

        return $this;
    }

    public function getFactureCjm(): ?int
    {
        return $this->factureCjm;
    }

    public function setFactureCjm(?int $factureCjm): self
    {
        $this->factureCjm = $factureCjm;

        return $this;
    }

    public function getFactureTjm(): ?int
    {
        return $this->factureTjm;
    }

    public function setFactureTjm(?int $factureTjm): self
    {
        $this->factureTjm = $factureTjm;

        return $this;
    }

    public function getFkFacturePeriode(): ?Periode
    {
        return $this->fkFacturePeriode;
    }

    public function setFkFacturePeriode(?Periode $fkFacturePeriode): self
    {
        $this->fkFacturePeriode = $fkFacturePeriode;

        return $this;
    }

    public function getFkFactureType(): ?TypeFacture
    {
        return $this->fkFactureType;
    }

    public function setFkFactureType(?TypeFacture $fkFactureType): self
    {
        $this->fkFactureType = $fkFactureType;

        return $this;
    }


}
