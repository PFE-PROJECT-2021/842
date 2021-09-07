<?php

namespace App\Entity;

use App\Repository\FicheclientRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FicheclientRepository::class)
 */
class Ficheclient
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomclient;

    /**
     * @ORM\Column(type="bigint")
     */
    private $telclient;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $emailcli;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $activite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $siteexistant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $referencement;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomclient(): ?string
    {
        return $this->nomclient;
    }

    public function setNomclient(string $nomclient): self
    {
        $this->nomclient = $nomclient;

        return $this;
    }

    public function getTelclient(): ?string
    {
        return $this->telclient;
    }

    public function setTelclient(string $telclient): self
    {
        $this->telclient = $telclient;

        return $this;
    }

    public function getEmailcli(): ?string
    {
        return $this->emailcli;
    }

    public function setEmailcli(string $emailcli): self
    {
        $this->emailcli = $emailcli;

        return $this;
    }

    public function getActivite(): ?string
    {
        return $this->activite;
    }

    public function setActivite(string $activite): self
    {
        $this->activite = $activite;

        return $this;
    }

    public function getSiteexistant(): ?string
    {
        return $this->siteexistant;
    }

    public function setSiteexistant(string $siteexistant): self
    {
        $this->siteexistant = $siteexistant;

        return $this;
    }

    public function getReferencement(): ?string
    {
        return $this->referencement;
    }

    public function setReferencement(string $referencement): self
    {
        $this->referencement = $referencement;

        return $this;
    }
}
