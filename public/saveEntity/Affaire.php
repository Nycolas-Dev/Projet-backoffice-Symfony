<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Affaire
 *
 * @ORM\Table(name="affaire", indexes={@ORM\Index(name="fk_affaire_societe", columns={"fk_affaire_societe"})})
 * @ORM\Entity(repositoryClass="App\Repository\AffaireRepository")
 */
class Affaire
{
    /**
     * @var int
     *
     * @ORM\Column(name="affaire_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $affaireId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="affaire_montant", type="integer", nullable=true)
     */
    private $affaireMontant;

    /**
     * @var \Societe
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Societe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_affaire_societe", referencedColumnName="societe_id")
     * })
     */
    private $fkAffaireSociete;

    public function getAffaireId(): ?int
    {
        return $this->affaireId;
    }

    public function getAffaireMontant(): ?int
    {
        return $this->affaireMontant;
    }

    public function setAffaireMontant(?int $affaireMontant): self
    {
        $this->affaireMontant = $affaireMontant;

        return $this;
    }

    public function getFkAffaireSociete(): ?Societe
    {
        return $this->fkAffaireSociete;
    }

    public function setFkAffaireSociete(?Societe $fkAffaireSociete): self
    {
        $this->fkAffaireSociete = $fkAffaireSociete;

        return $this;
    }


}
