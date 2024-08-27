<?php

namespace App\Entity;

use App\Repository\CompetencesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompetencesRepository::class)]
class Competences
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    /**
     * @var Collection<int, CompetencesUsers>
     */
    #[ORM\OneToMany(targetEntity: CompetencesUsers::class, mappedBy: 'competences_id')]
    private Collection $competencesUsers;

    public function __construct()
    {
        $this->competencesUsers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection<int, CompetencesUsers>
     */
    public function getCompetencesUsers(): Collection
    {
        return $this->competencesUsers;
    }

    public function addCompetencesUser(CompetencesUsers $competencesUser): static
    {
        if (!$this->competencesUsers->contains($competencesUser)) {
            $this->competencesUsers->add($competencesUser);
            $competencesUser->setCompetencesId($this);
        }

        return $this;
    }

    public function removeCompetencesUser(CompetencesUsers $competencesUser): static
    {
        if ($this->competencesUsers->removeElement($competencesUser)) {
            // set the owning side to null (unless already changed)
            if ($competencesUser->getCompetencesId() === $this) {
                $competencesUser->setCompetencesId(null);
            }
        }

        return $this;
    }
}
