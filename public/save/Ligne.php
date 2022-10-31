<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ligne
 *
 * @ORM\Table(name="ligne", indexes={@ORM\Index(name="fk_ligne_lieu", columns={"fk_ligne_lieu"}), @ORM\Index(name="fk_ligne_cra", columns={"fk_ligne_cra"})})
 * @ORM\Entity(repositoryClass="App\Repository\LigneRepository")
 */
class Ligne
{
    /**
     * @var int
     *
     * @ORM\Column(name="ligne_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $ligneId;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="ligne_date", type="date", nullable=true)
     */
    private $ligneDate;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ligne_prestation", type="string", length=255, nullable=true)
     */
    private $lignePrestation;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ligne_jours_homme", type="integer", nullable=true)
     */
    private $ligneJoursHomme;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ligne_heures", type="integer", nullable=true)
     */
    private $ligneHeures;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ligne_transport", type="integer", nullable=true)
     */
    private $ligneTransport;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ligne_hotel", type="integer", nullable=true)
     */
    private $ligneHotel;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ligne_repas", type="integer", nullable=true)
     */
    private $ligneRepas;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ligne_frais", type="integer", nullable=true)
     */
    private $ligneFrais;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ligne_voiture", type="integer", nullable=true)
     */
    private $ligneVoiture;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ligne_moto", type="integer", nullable=true)
     */
    private $ligneMoto;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ligne_train", type="integer", nullable=true)
     */
    private $ligneTrain;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ligne_avion", type="integer", nullable=true)
     */
    private $ligneAvion;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ligne_co2", type="integer", nullable=true)
     */
    private $ligneCo2;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ligne_arbre", type="integer", nullable=true)
     */
    private $ligneArbre;

    /**
     * @var \Cra
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Cra")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_ligne_cra", referencedColumnName="cra_id")
     * })
     */
    private $fkLigneCra;

    /**
     * @var \Lieu
     *
     * @ORM\ManyToOne(targetEntity="Lieu")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_ligne_lieu", referencedColumnName="lieu_id")
     * })
     */
    private $fkLigneLieu;

    public function getLigneId(): ?int
    {
        return $this->ligneId;
    }

    public function getLigneDate(): ?\DateTimeInterface
    {
        return $this->ligneDate;
    }

    public function setLigneDate(?\DateTimeInterface $ligneDate): self
    {
        $this->ligneDate = $ligneDate;

        return $this;
    }

    public function getLignePrestation(): ?string
    {
        return $this->lignePrestation;
    }

    public function setLignePrestation(?string $lignePrestation): self
    {
        $this->lignePrestation = $lignePrestation;

        return $this;
    }

    public function getLigneJoursHomme(): ?int
    {
        return $this->ligneJoursHomme;
    }

    public function setLigneJoursHomme(?int $ligneJoursHomme): self
    {
        $this->ligneJoursHomme = $ligneJoursHomme;

        return $this;
    }

    public function getLigneHeures(): ?int
    {
        return $this->ligneHeures;
    }

    public function setLigneHeures(?int $ligneHeures): self
    {
        $this->ligneHeures = $ligneHeures;

        return $this;
    }

    public function getLigneTransport(): ?int
    {
        return $this->ligneTransport;
    }

    public function setLigneTransport(?int $ligneTransport): self
    {
        $this->ligneTransport = $ligneTransport;

        return $this;
    }

    public function getLigneHotel(): ?int
    {
        return $this->ligneHotel;
    }

    public function setLigneHotel(?int $ligneHotel): self
    {
        $this->ligneHotel = $ligneHotel;

        return $this;
    }

    public function getLigneRepas(): ?int
    {
        return $this->ligneRepas;
    }

    public function setLigneRepas(?int $ligneRepas): self
    {
        $this->ligneRepas = $ligneRepas;

        return $this;
    }

    public function getLigneFrais(): ?int
    {
        return $this->ligneFrais;
    }

    public function setLigneFrais(?int $ligneFrais): self
    {
        $this->ligneFrais = $ligneFrais;

        return $this;
    }

    public function getLigneVoiture(): ?int
    {
        return $this->ligneVoiture;
    }

    public function setLigneVoiture(?int $ligneVoiture): self
    {
        $this->ligneVoiture = $ligneVoiture;

        return $this;
    }

    public function getLigneMoto(): ?int
    {
        return $this->ligneMoto;
    }

    public function setLigneMoto(?int $ligneMoto): self
    {
        $this->ligneMoto = $ligneMoto;

        return $this;
    }

    public function getLigneTrain(): ?int
    {
        return $this->ligneTrain;
    }

    public function setLigneTrain(?int $ligneTrain): self
    {
        $this->ligneTrain = $ligneTrain;

        return $this;
    }

    public function getLigneAvion(): ?int
    {
        return $this->ligneAvion;
    }

    public function setLigneAvion(?int $ligneAvion): self
    {
        $this->ligneAvion = $ligneAvion;

        return $this;
    }

    public function getLigneCo2(): ?int
    {
        return $this->ligneCo2;
    }

    public function setLigneCo2(?int $ligneCo2): self
    {
        $this->ligneCo2 = $ligneCo2;

        return $this;
    }

    public function getLigneArbre(): ?int
    {
        return $this->ligneArbre;
    }

    public function setLigneArbre(?int $ligneArbre): self
    {
        $this->ligneArbre = $ligneArbre;

        return $this;
    }

    public function getFkLigneCra(): ?Cra
    {
        return $this->fkLigneCra;
    }

    public function setFkLigneCra(?Cra $fkLigneCra): self
    {
        $this->fkLigneCra = $fkLigneCra;

        return $this;
    }

    public function getFkLigneLieu(): ?Lieu
    {
        return $this->fkLigneLieu;
    }

    public function setFkLigneLieu(?Lieu $fkLigneLieu): self
    {
        $this->fkLigneLieu = $fkLigneLieu;

        return $this;
    }


}
