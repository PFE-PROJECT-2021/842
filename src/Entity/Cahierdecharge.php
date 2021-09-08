<?php

namespace App\Entity;

use App\Repository\CahierdechargeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CahierdechargeRepository::class)
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
     * @ORM\Column(type="string", length=255)
     */
    private $media;

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

    public function getMedia(): ?string
    {
        return $this->media;
    }

    public function setMedia(string $media): self
    {
        $this->media = $media;

        return $this;
    }
}
