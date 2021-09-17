<?php

namespace App\Entity;

use App\Repository\FicheclientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use mysql_xdevapi\Collection;

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
     * @ORM\Column(type="boolean")
     */
    private $siteexistant;

    /**
     * @ORM\Column(type="boolean")
     */
    private $referencement;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $raisonsociale;

    /**
     * @var ArrayCollection|Collection
     *
     * @ORM\OneToOne(targetEntity=Ficheprospect::class, mappedBy="client", cascade={"persist", "remove"})
     */
    private $ficheprospect;

    /**
     * @var ArrayCollection|Collection
     *
     * @ORM\OneToOne(targetEntity=Ficherendezvous::class, mappedBy="entreprise", cascade={"persist", "remove"})
     */
    private $ficherendezvous;

    public function __toString()
    {
        return $this->getNomclient().' - '.$this->getRaisonsociale();
    }

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

    public function getSiteexistant(): ?bool
    {
        return $this->siteexistant;
    }

    public function setSiteexistant(bool $siteexistant): self
    {
        $this->siteexistant = $siteexistant;

        return $this;
    }



    public function getRaisonsociale(): ?string
    {
        return $this->raisonsociale;
    }

    public function setRaisonsociale(string $raisonsociale): self
    {
        $this->raisonsociale = $raisonsociale;

        return $this;
    }

    public function getReferencement(): ?bool
    {
        return $this->referencement;
    }

    public function setReferencement(bool $referencement): self
    {
        $this->referencement = $referencement;

        return $this;
    }

    public function getFicheprospect(): ?Ficheprospect
    {
        return $this->ficheprospect;
    }

    public function setFicheprospect(?Ficheprospect $ficheprospect): self
    {
        // unset the owning side of the relation if necessary
        if ($ficheprospect === null && $this->ficheprospect !== null) {
            $this->ficheprospect->setClient(null);
        }

        // set the owning side of the relation if necessary
        if ($ficheprospect !== null && $ficheprospect->getClient() !== $this) {
            $ficheprospect->setClient($this);
        }

        $this->ficheprospect = $ficheprospect;

        return $this;
    }

    public function getFicherendezvous(): ?Ficherendezvous
    {
        return $this->ficherendezvous;
    }

    public function setFicherendezvous(?Ficherendezvous $ficherendezvous): self
    {
        // unset the owning side of the relation if necessary
        if ($ficherendezvous === null && $this->ficherendezvous !== null) {
            $this->ficherendezvous->setEntreprise(null);
        }

        // set the owning side of the relation if necessary
        if ($ficherendezvous !== null && $ficherendezvous->getEntreprise() !== $this) {
            $ficherendezvous->setEntreprise($this);
        }

        $this->ficherendezvous = $ficherendezvous;

        return $this;
    }

}
