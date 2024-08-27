<?php

namespace App\Entity;

use App\Repository\CompetencesUsersRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompetencesUsersRepository::class)]
class CompetencesUsers
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'competencesUsers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Competences $competences = null;

    #[ORM\ManyToOne(inversedBy: 'competencesUsers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?users $users = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompetencesId(): ?Competences
    {
        return $this->competences;
    }

    public function setCompetencesId(?Competences $competences): static
    {
        $this->competences = $competences;

        return $this;
    }

    public function getUsersId(): ?users
    {
        return $this->users;
    }

    public function setUsersId(?users $users): static
    {
        $this->users = $users;

        return $this;
    }
}
