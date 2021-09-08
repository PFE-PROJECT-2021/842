<?php

namespace App\Entity;

use App\Repository\FicherendezvousRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FicherendezvousRepository::class)
 */
class Ficherendezvous
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datepriserdv;

    /**
     * @ORM\Column(type="datetime")
     */
    private $daterdv;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $engagement;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $prix;

    /**
     * @ORM\Column(type="integer")
     */
    private $notequalif;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $commentaire;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $rappel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sms;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatepriserdv(): ?\DateTimeInterface
    {
        return $this->datepriserdv;
    }

    public function setDatepriserdv(\DateTimeInterface $datepriserdv): self
    {
        $this->datepriserdv = $datepriserdv;

        return $this;
    }

    public function getDaterdv(): ?\DateTimeInterface
    {
        return $this->daterdv;
    }

    public function setDaterdv(\DateTimeInterface $daterdv): self
    {
        $this->daterdv = $daterdv;

        return $this;
    }

    public function getEngagement(): ?string
    {
        return $this->engagement;
    }

    public function setEngagement(string $engagement): self
    {
        $this->engagement = $engagement;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(?int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getNotequalif(): ?int
    {
        return $this->notequalif;
    }

    public function setNotequalif(int $notequalif): self
    {
        $this->notequalif = $notequalif;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getRappel(): ?string
    {
        return $this->rappel;
    }

    public function setRappel(string $rappel): self
    {
        $this->rappel = $rappel;

        return $this;
    }

    public function getSms(): ?string
    {
        return $this->sms;
    }

    public function setSms(string $sms): self
    {
        $this->sms = $sms;

        return $this;
    }
}
