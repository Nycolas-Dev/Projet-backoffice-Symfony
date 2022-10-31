<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeMission
 *
 * @ORM\Table(name="type_mission")
 * @ORM\Entity(repositoryClass="App\Repository\TypeMissionRepository")
 */
class TypeMission
{
    /**
     * @var int
     *
     * @ORM\Column(name="type_mission_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $typeMissionId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="type_mission_nom", type="string", length=45, nullable=true)
     */
    private $typeMissionNom;

    public function getTypeMissionId(): ?int
    {
        return $this->typeMissionId;
    }

    public function getTypeMissionNom(): ?string
    {
        return $this->typeMissionNom;
    }

    public function setTypeMissionNom(?string $typeMissionNom): self
    {
        $this->typeMissionNom = $typeMissionNom;

        return $this;
    }


}
