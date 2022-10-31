<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeSociete
 *
 * @ORM\Table(name="type_societe")
 * @ORM\Entity(repositoryClass="App\Repository\TypeSocieteRepository")
 */
class TypeSociete
{
    /**
     * @var int
     *
     * @ORM\Column(name="type_societe_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $typeSocieteId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="type_societe_nom", type="string", length=45, nullable=true)
     */
    private $typeSocieteNom;

    public function getTypeSocieteId(): ?int
    {
        return $this->typeSocieteId;
    }

    public function getTypeSocieteNom(): ?string
    {
        return $this->typeSocieteNom;
    }

    public function setTypeSocieteNom(?string $typeSocieteNom): self
    {
        $this->typeSocieteNom = $typeSocieteNom;

        return $this;
    }


}
