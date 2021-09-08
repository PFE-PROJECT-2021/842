<?php

namespace App\Entity;

use App\Repository\FicheprospectRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FicheprospectRepository::class)
 */
class Ficheprospect
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
    private $daterappel;

    /**
     * @ORM\Column(type="text")
     */
    private $commentaireappel;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateappel;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDaterappel(): ?\DateTimeInterface
    {
        return $this->daterappel;
    }

    public function setDaterappel(\DateTimeInterface $daterappel): self
    {
        $this->daterappel = $daterappel;

        return $this;
    }

    public function getCommentaireappel(): ?string
    {
        return $this->commentaireappel;
    }

    public function setCommentaireappel(string $commentaireappel): self
    {
        $this->commentaireappel = $commentaireappel;

        return $this;
    }

    public function getDateappel(): ?\DateTimeInterface
    {
        return $this->dateappel;
    }

    public function setDateappel(\DateTimeInterface $dateappel): self
    {
        $this->dateappel = $dateappel;

        return $this;
    }
}
