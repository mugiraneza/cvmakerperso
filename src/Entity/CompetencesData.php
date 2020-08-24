<?php

namespace App\Entity;

use App\Repository\CompetencesDataRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompetencesDataRepository::class)
 */
class CompetencesData
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $niveau;

    /**
     * @ORM\ManyToOne(targetEntity=Personnes::class, inversedBy="competencesData")
     * @ORM\JoinColumn(nullable=false)
     */
    private $personne;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getNiveau(): ?string
    {
        return $this->niveau;
    }

    public function setNiveau(string $niveau): self
    {
        $this->niveau = $niveau;

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
