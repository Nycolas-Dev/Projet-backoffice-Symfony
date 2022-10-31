<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lieu
 *
 * @ORM\Table(name="lieu")
 * @ORM\Entity(repositoryClass="App\Repository\LieuRepository")
 */
class Lieu
{
    /**
     * @var int
     *
     * @ORM\Column(name="lieu_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $lieuId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lieu_nom", type="string", length=45, nullable=true)
     */
    private $lieuNom;

    public function getLieuId(): ?int
    {
        return $this->lieuId;
    }

    public function getLieuNom(): ?string
    {
        return $this->lieuNom;
    }

    public function setLieuNom(?string $lieuNom): self
    {
        $this->lieuNom = $lieuNom;

        return $this;
    }


}
