<?php

namespace App\Entity;

use App\Repository\DiplomesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DiplomesRepository::class)
 */
class Diplomes
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $moisdebut;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $anneedebut;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $moisfin;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $anneefin;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $entreprise;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\Column(type="string", length=1024, nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=Personnes::class, inversedBy="diplomes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $personne;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMoisdebut(): ?string
    {
        return $this->moisdebut;
    }

    public function setMoisdebut(string $moisdebut): self
    {
        $this->moisdebut = $moisdebut;

        return $this;
    }

    public function getAnneedebut(): ?string
    {
        return $this->anneedebut;
    }

    public function setAnneedebut(?string $anneedebut): self
    {
        $this->anneedebut = $anneedebut;

        return $this;
    }

    public function getMoisfin(): ?string
    {
        return $this->moisfin;
    }

    public function setMoisfin(?string $moisfin): self
    {
        $this->moisfin = $moisfin;

        return $this;
    }

    public function getAnneefin(): ?string
    {
        return $this->anneefin;
    }

    public function setAnneefin(?string $anneefin): self
    {
        $this->anneefin = $anneefin;

        return $this;
    }

    public function getEntreprise(): ?string
    {
        return $this->entreprise;
    }

    public function setEntreprise(string $entreprise): self
    {
        $this->entreprise = $entreprise;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPersonne(): ?Personnes
    {
        return $this->personne;
    }

    public function setPersonne(?Personnes $personne): self
    {
        $this->personne = $personne;

        return $this;
    }
}
