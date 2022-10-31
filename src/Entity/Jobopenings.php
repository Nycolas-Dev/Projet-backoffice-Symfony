<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Jobopenings
 *
 * @ORM\Table(name="JobOpenings")
 * @ORM\Entity(repositoryClass="App\Repository\JobopeningsRepository")
 */
class Jobopenings
{
    /**
     * @var string
     *
     * @ORM\Column(name="JobOpeningID", type="string", length=20, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $jobopeningid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="JobOpeningType", type="string", length=200, nullable=true)
     */
    private $jobopeningtype;

    /**
     * @var string
     *
     * @ORM\Column(name="JobOpeningPublish", type="string", length=10, nullable=false)
     */
    private $jobopeningpublish = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="JobOpeningStatus", type="string", length=100, nullable=true)
     */
    private $jobopeningstatus;

    /**
     * @var string|null
     *
     * @ORM\Column(name="JobOpeningPostingTitle", type="string", length=150, nullable=true)
     */
    private $jobopeningpostingtitle;

    /**
     * @var string
     *
     * @ORM\Column(name="JobOpeningClientName", type="string", length=200, nullable=false)
     */
    private $jobopeningclientname;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="JobOpeningLastUpdate", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $jobopeninglastupdate = 'CURRENT_TIMESTAMP';

    public function getJobopeningid(): ?string
    {
        return $this->jobopeningid;
    }

    public function getJobopeningtype(): ?string
    {
        return $this->jobopeningtype;
    }

    public function setJobopeningtype(?string $jobopeningtype): self
    {
        $this->jobopeningtype = $jobopeningtype;

        return $this;
    }

    public function getJobopeningpublish(): ?string
    {
        return $this->jobopeningpublish;
    }

    public function setJobopeningpublish(string $jobopeningpublish): self
    {
        $this->jobopeningpublish = $jobopeningpublish;

        return $this;
    }

    public function getJobopeningstatus(): ?string
    {
        return $this->jobopeningstatus;
    }

    public function setJobopeningstatus(?string $jobopeningstatus): self
    {
        $this->jobopeningstatus = $jobopeningstatus;

        return $this;
    }

    public function getJobopeningpostingtitle(): ?string
    {
        return $this->jobopeningpostingtitle;
    }

    public function setJobopeningpostingtitle(?string $jobopeningpostingtitle): self
    {
        $this->jobopeningpostingtitle = $jobopeningpostingtitle;

        return $this;
    }

    public function getJobopeningclientname(): ?string
    {
        return $this->jobopeningclientname;
    }

    public function setJobopeningclientname(string $jobopeningclientname): self
    {
        $this->jobopeningclientname = $jobopeningclientname;

        return $this;
    }

    public function getJobopeninglastupdate(): ?\DateTimeInterface
    {
        return $this->jobopeninglastupdate;
    }

    public function setJobopeninglastupdate(\DateTimeInterface $jobopeninglastupdate): self
    {
        $this->jobopeninglastupdate = $jobopeninglastupdate;

        return $this;
    }


}
