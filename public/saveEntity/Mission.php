<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mission
 *
 * @ORM\Table(name="mission", indexes={@ORM\Index(name="fk_mission_tye", columns={"fk_mission_type"}), @ORM\Index(name="fk_mission_affaire", columns={"fk_mission_affaire"}), @ORM\Index(name="fk_mission_parteamer", columns={"fk_mission_parteamer"})})
 * @ORM\Entity(repositoryClass="App\Repository\MissionRepository")
 */
class Mission
{
    /**
     * @var int
     *
     * @ORM\Column(name="mission_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $missionId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="mission_nombre_jours", type="integer", nullable=true)
     */
    private $missionNombreJours;

    /**
     * @var \Affaire
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Affaire")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_mission_affaire", referencedColumnName="affaire_id")
     * })
     */
    private $fkMissionAffaire;

    /**
     * @var \Parteamer
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Parteamer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_mission_parteamer", referencedColumnName="parteamer_id")
     * })
     */
    private $fkMissionParteamer;

    /**
     * @var \TypeMission
     *
     * @ORM\ManyToOne(targetEntity="TypeMission")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fk_mission_type", referencedColumnName="type_mission_id")
     * })
     */
    private $fkMissionType;

    public function getMissionId(): ?int
    {
        return $this->missionId;
    }

    public function getMissionNombreJours(): ?int
    {
        return $this->missionNombreJours;
    }

    public function setMissionNombreJours(?int $missionNombreJours): self
    {
        $this->missionNombreJours = $missionNombreJours;

        return $this;
    }

    public function getFkMissionAffaire(): ?Affaire
    {
        return $this->fkMissionAffaire;
    }

    public function setFkMissionAffaire(?Affaire $fkMissionAffaire): self
    {
        $this->fkMissionAffaire = $fkMissionAffaire;

        return $this;
    }

    public function getFkMissionParteamer(): ?Parteamer
    {
        return $this->fkMissionParteamer;
    }

    public function setFkMissionParteamer(?Parteamer $fkMissionParteamer): self
    {
        $this->fkMissionParteamer = $fkMissionParteamer;

        return $this;
    }

    public function getFkMissionType(): ?TypeMission
    {
        return $this->fkMissionType;
    }

    public function setFkMissionType(?TypeMission $fkMissionType): self
    {
        $this->fkMissionType = $fkMissionType;

        return $this;
    }


}
