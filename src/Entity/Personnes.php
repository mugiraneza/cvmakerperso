<?php

namespace App\Entity;

use App\Repository\PersonnesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PersonnesRepository::class)
 */
class Personnes
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $profession;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cvpdf;

    /**
     * @ORM\Column(type="string", length=1024)
     */
    private $apropos;

    /**
     * @ORM\Column(type="integer")
     */
    private $Age;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $langues;

    /**
     * @ORM\OneToMany(targetEntity=Email::class, mappedBy="personnes", orphanRemoval=true)
     */
    private $emails;

    /**
     * @ORM\OneToMany(targetEntity=Competencesprog::class, mappedBy="personne", orphanRemoval=true)
     */
    private $competencesprogs;

    /**
     * @ORM\OneToMany(targetEntity=Reseaux::class, mappedBy="personne", orphanRemoval=true)
     */
    private $reseauxes;

    /**
     * @ORM\OneToMany(targetEntity=CompetencesData::class, mappedBy="personne", orphanRemoval=true)
     */
    private $competencesData;

    /**
     * @ORM\OneToMany(targetEntity=Experiences::class, mappedBy="personne", orphanRemoval=true)
     */
    private $experiences;

    /**
     * @ORM\OneToMany(targetEntity=Diplomes::class, mappedBy="personne", orphanRemoval=true)
     */
    private $diplomes;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $portrait;

    public function __construct()
    {
        $this->emails = new ArrayCollection();
        $this->competencesprogs = new ArrayCollection();
        $this->reseauxes = new ArrayCollection();
        $this->competencesData = new ArrayCollection();
        $this->experiences = new ArrayCollection();
        $this->diplomes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getProfession(): ?string
    {
        return $this->profession;
    }

    public function setProfession(string $profession): self
    {
        $this->profession = $profession;

        return $this;
    }

    public function getCvpdf(): ?string
    {
        return $this->cvpdf;
    }

    public function setCvpdf(string $cvpdf): self
    {
        $this->cvpdf = $cvpdf;

        return $this;
    }

    public function getApropos(): ?string
    {
        return $this->apropos;
    }

    public function setApropos(string $apropos): self
    {
        $this->apropos = $apropos;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->Age;
    }

    public function setAge(int $Age): self
    {
        $this->Age = $Age;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getLangues(): ?string
    {
        return $this->langues;
    }

    public function setLangues(string $langues): self
    {
        $this->langues = $langues;

        return $this;
    }

    /**
     * @return Collection|Email[]
     */
    public function getEmails(): Collection
    {
        return $this->emails;
    }

    public function addEmail(Email $email): self
    {
        if (!$this->emails->contains($email)) {
            $this->emails[] = $email;
            $email->setPersonnes($this);
        }

        return $this;
    }

    public function removeEmail(Email $email): self
    {
        if ($this->emails->contains($email)) {
            $this->emails->removeElement($email);
            // set the owning side to null (unless already changed)
            if ($email->getPersonnes() === $this) {
                $email->setPersonnes(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Competencesprog[]
     */
    public function getCompetencesprogs(): Collection
    {
        return $this->competencesprogs;
    }

    public function addCompetencesprog(Competencesprog $competencesprog): self
    {
        if (!$this->competencesprogs->contains($competencesprog)) {
            $this->competencesprogs[] = $competencesprog;
            $competencesprog->setPersonne($this);
        }

        return $this;
    }

    public function removeCompetencesprog(Competencesprog $competencesprog): self
    {
        if ($this->competencesprogs->contains($competencesprog)) {
            $this->competencesprogs->removeElement($competencesprog);
            // set the owning side to null (unless already changed)
            if ($competencesprog->getPersonne() === $this) {
                $competencesprog->setPersonne(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Reseaux[]
     */
    public function getReseauxes(): Collection
    {
        return $this->reseauxes;
    }

    public function addReseaux(Reseaux $reseaux): self
    {
        if (!$this->reseauxes->contains($reseaux)) {
            $this->reseauxes[] = $reseaux;
            $reseaux->setPersonne($this);
        }

        return $this;
    }

    public function removeReseaux(Reseaux $reseaux): self
    {
        if ($this->reseauxes->contains($reseaux)) {
            $this->reseauxes->removeElement($reseaux);
            // set the owning side to null (unless already changed)
            if ($reseaux->getPersonne() === $this) {
                $reseaux->setPersonne(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|CompetencesData[]
     */
    public function getCompetencesData(): Collection
    {
        return $this->competencesData;
    }

    public function addCompetencesData(CompetencesData $competencesData): self
    {
        if (!$this->competencesData->contains($competencesData)) {
            $this->competencesData[] = $competencesData;
            $competencesData->setPersonne($this);
        }

        return $this;
    }

    public function removeCompetencesData(CompetencesData $competencesData): self
    {
        if ($this->competencesData->contains($competencesData)) {
            $this->competencesData->removeElement($competencesData);
            // set the owning side to null (unless already changed)
            if ($competencesData->getPersonne() === $this) {
                $competencesData->setPersonne(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Experiences[]
     */
    public function getExperiences(): Collection
    {
        return $this->experiences;
    }

    public function addExperience(Experiences $experience): self
    {
        if (!$this->experiences->contains($experience)) {
            $this->experiences[] = $experience;
            $experience->setPersonne($this);
        }

        return $this;
    }

    public function removeExperience(Experiences $experience): self
    {
        if ($this->experiences->contains($experience)) {
            $this->experiences->removeElement($experience);
            // set the owning side to null (unless already changed)
            if ($experience->getPersonne() === $this) {
                $experience->setPersonne(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Diplomes[]
     */
    public function getDiplomes(): Collection
    {
        return $this->diplomes;
    }

    public function addDiplome(Diplomes $diplome): self
    {
        if (!$this->diplomes->contains($diplome)) {
            $this->diplomes[] = $diplome;
            $diplome->setPersonne($this);
        }

        return $this;
    }

    public function removeDiplome(Diplomes $diplome): self
    {
        if ($this->diplomes->contains($diplome)) {
            $this->diplomes->removeElement($diplome);
            // set the owning side to null (unless already changed)
            if ($diplome->getPersonne() === $this) {
                $diplome->setPersonne(null);
            }
        }

        return $this;
    }

    public function getPortrait(): ?string
    {
        return $this->portrait;
    }

    public function setPortrait(string $portrait): self
    {
        $this->portrait = $portrait;

        return $this;
    }
}
