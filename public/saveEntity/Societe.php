<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Societe
 *
 * @ORM\Table(name="societe", indexes={@ORM\Index(name="fk_societe_type", columns={"fk_societe_type"})})
 * @ORM\Entity(repositoryClass="App\Repository\SocieteRepository")
 */
class Societe
{
    /**
     * @var int
     *
     * @ORM\Column(name="societe_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $societeId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="societe_siret", type="string", length=45, nullable=true)
     */
    private $societeSiret;

    /**
     * @var string|null
     *
     * @ORM\Column(name="societe_raison_sociale", type="string", length=45, nullable=true)
     */
    private $societeRaisonSociale;

    /**
     * @var string|null
     *
     * @ORM\Column(name="societe_adresse", type="string", length=255, nullable=true)
     */
    private $societeAdresse;

    /**
     * @var int|null
     *
     * @ORM\Column(name="societe_code_postal", type="integer", nullable=true)
     */
    private $societeCodePostal;

    /**
     * @var string|null
     *
     * @ORM\Column(name="societe_ville", type="string", length=45, nullable=true)
     */
    private $societeVille;

    /**
     * @var string|null
     *
     * @ORM\Column(name="societe_tel", type="string", length=45, nullable=true)
     */
    private $societeTel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="societe_contact", type="string", length=45, nullable=true)
     */
    private $societeContact;

    /**
     * @var \TypeSociete
     *
     * @ORM\ManyToOne(targetEntity="TypeSociete")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_societe_type", referencedColumnName="type_societe_id")
     * })
     */
    private $fkSocieteType;

    public function getSocieteId(): ?int
    {
        return $this->societeId;
    }

    public function getSocieteSiret(): ?string
    {
        return $this->societeSiret;
    }

    public function setSocieteSiret(?string $societeSiret): self
    {
        $this->societeSiret = $societeSiret;

        return $this;
    }

    public function getSocieteRaisonSociale(): ?string
    {
        return $this->societeRaisonSociale;
    }

    public function setSocieteRaisonSociale(?string $societeRaisonSociale): self
    {
        $this->societeRaisonSociale = $societeRaisonSociale;

        return $this;
    }

    public function getSocieteAdresse(): ?string
    {
        return $this->societeAdresse;
    }

    public function setSocieteAdresse(?string $societeAdresse): self
    {
        $this->societeAdresse = $societeAdresse;

        return $this;
    }

    public function getSocieteCodePostal(): ?int
    {
        return $this->societeCodePostal;
    }

    public function setSocieteCodePostal(?int $societeCodePostal): self
    {
        $this->societeCodePostal = $societeCodePostal;

        return $this;
    }

    public function getSocieteVille(): ?string
    {
        return $this->societeVille;
    }

    public function setSocieteVille(?string $societeVille): self
    {
        $this->societeVille = $societeVille;

        return $this;
    }

    public function getSocieteTel(): ?string
    {
        return $this->societeTel;
    }

    public function setSocieteTel(?string $societeTel): self
    {
        $this->societeTel = $societeTel;

        return $this;
    }

    public function getSocieteContact(): ?string
    {
        return $this->societeContact;
    }

    public function setSocieteContact(?string $societeContact): self
    {
        $this->societeContact = $societeContact;

        return $this;
    }

    public function getFkSocieteType(): ?TypeSociete
    {
        return $this->fkSocieteType;
    }

    public function setFkSocieteType(?TypeSociete $fkSocieteType): self
    {
        $this->fkSocieteType = $fkSocieteType;

        return $this;
    }


}
