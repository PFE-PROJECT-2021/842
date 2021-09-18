<?php

namespace App\Entity;

use App\Repository\CahierdechargeRepository;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;

/**
 * @ORM\Entity(repositoryClass=CahierdechargeRepository::class)
 * @Vich\Uploadable()
 */
class Cahierdecharge
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $descriptproj;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $infoproj;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pjname;

    /**
     * @Vich\UploadableField(mapping="certificat", fileNameProperty="pjname")
     */
    private $pjfiles;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTimeInterface|null
     */
    private $updatedAt;


    public function __construct()
    {
        $this->updatedAt = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescriptproj(): ?string
    {
        return $this->descriptproj;
    }

    public function setDescriptproj(string $descriptproj): self
    {
        $this->descriptproj = $descriptproj;

        return $this;
    }

    public function getInfoproj(): ?string
    {
        return $this->infoproj;
    }

    public function setInfoproj(string $infoproj): self
    {
        $this->infoproj = $infoproj;

        return $this;
    }

    public function getPjname(): ?string
    {
        return $this->pjname;
    }

    public function setPjname(?string $pjname): self
    {
        $this->pjname = $pjname;

        return $this;
    }

    public function getPjFiles(): ?File
    {
        return $this->pjfiles;
    }

    public function setPjFiles(?File $pjfiles = null): void
    {
        $this->pjfiles = $pjfiles;

        if (null !== $pjfiles) {
            $this->updatedAt = new \DateTime();
        }
    }

    /**
     * Get the value of updatedAt
     *
     * @return  \DateTimeInterface|null
     */
    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    /**
     * Set the value of updatedAt
     *
     * @param  \DateTimeInterface|null  $updatedAt
     *
     * @return  self
     */
    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

}
