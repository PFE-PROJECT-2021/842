<?php

namespace App\Entity;

use App\Repository\PerformanceagentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PerformanceagentRepository::class)
 */
class Performanceagent
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $dateappel;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbappel;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="performance")
     */
    private $agent;

    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getNbappel(): ?int
    {
        return $this->nbappel;
    }

    public function setNbappel(int $nbappel): self
    {
        $this->nbappel = $nbappel;

        return $this;
    }

    public function getAgent(): ?User
    {
        return $this->agent;
    }

    public function setAgent(?User $agent): self
    {
        $this->agent = $agent;

        return $this;
    }

}
