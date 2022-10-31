<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeFacture
 *
 * @ORM\Table(name="type_facture")
 * @ORM\Entity(repositoryClass="App\Repository\TypeFactureRepository")
 */
class TypeFacture
{
    /**
     * @var int
     *
     * @ORM\Column(name="type_facture_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $typeFactureId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="type_facture_nom", type="string", length=45, nullable=true)
     */
    private $typeFactureNom;

    public function getTypeFactureId(): ?int
    {
        return $this->typeFactureId;
    }

    public function getTypeFactureNom(): ?string
    {
        return $this->typeFactureNom;
    }

    public function setTypeFactureNom(?string $typeFactureNom): self
    {
        $this->typeFactureNom = $typeFactureNom;

        return $this;
    }


}
