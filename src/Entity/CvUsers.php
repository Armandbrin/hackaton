<?php

namespace App\Entity;

use App\Repository\CvUsersRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CvUsersRepository::class)]
class CvUsers
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'CvUsers', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Cv $cv = null;

    #[ORM\ManyToOne(inversedBy: 'CvUsers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Users $users = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCvId(): ?Cv
    {
        return $this->cv;
    }

    public function setCvId(Cv $cv): static
    {
        $this->cv = $cv;

        return $this;
    }

    public function getUsersId(): ?Users
    {
        return $this->users;
    }

    public function setUsersId(?Users $users): static
    {
        $this->users = $users;

        return $this;
    }
}
