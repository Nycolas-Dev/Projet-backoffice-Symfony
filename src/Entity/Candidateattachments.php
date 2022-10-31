<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Candidateattachments
 *
 * @ORM\Table(name="CandidateAttachments", indexes={@ORM\Index(name="AttachmentCandidateID", columns={"AttachmentCandidateID"})})
 * @ORM\Entity(repositoryClass="App\Repository\CandidateattachmentsRepository")
 */
class Candidateattachments
{
    /**
     * @var string
     *
     * @ORM\Column(name="AttachmentID", type="string", length=20, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $attachmentid;

    /**
     * @var string
     *
     * @ORM\Column(name="AttachmentName", type="string", length=200, nullable=false)
     */
    private $attachmentname;

    /**
     * @var string
     *
     * @ORM\Column(name="AttachmentCategory", type="string", length=200, nullable=false)
     */
    private $attachmentcategory;

    /**
     * @var string
     *
     * @ORM\Column(name="AttachmentCandidateID", type="string", length=20, nullable=false)
     */
    private $attachmentcandidateid;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="AttachmentLastUpdate", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $attachmentlastupdate = 'CURRENT_TIMESTAMP';

    public function getAttachmentid(): ?string
    {
        return $this->attachmentid;
    }

    public function getAttachmentname(): ?string
    {
        return $this->attachmentname;
    }

    public function setAttachmentname(string $attachmentname): self
    {
        $this->attachmentname = $attachmentname;

        return $this;
    }

    public function getAttachmentcategory(): ?string
    {
        return $this->attachmentcategory;
    }

    public function setAttachmentcategory(string $attachmentcategory): self
    {
        $this->attachmentcategory = $attachmentcategory;

        return $this;
    }

    public function getAttachmentcandidateid(): ?string
    {
        return $this->attachmentcandidateid;
    }

    public function setAttachmentcandidateid(string $attachmentcandidateid): self
    {
        $this->attachmentcandidateid = $attachmentcandidateid;

        return $this;
    }

    public function getAttachmentlastupdate(): ?\DateTimeInterface
    {
        return $this->attachmentlastupdate;
    }

    public function setAttachmentlastupdate(\DateTimeInterface $attachmentlastupdate): self
    {
        $this->attachmentlastupdate = $attachmentlastupdate;

        return $this;
    }


}
