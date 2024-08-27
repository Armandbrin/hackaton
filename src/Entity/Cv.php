<?php

namespace App\Entity;

use App\Repository\CvRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CvRepository::class)]
class Cv
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $contenue = null;

    #[ORM\OneToOne(mappedBy: 'cv_id', cascade: ['persist', 'remove'])]
    private ?CvUsers $cvUsers = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContenue(): ?string
    {
        return $this->contenue;
    }

    public function setContenue(string $contenue): static
    {
        $this->contenue = $contenue;

        return $this;
    }

    public function getCvUsers(): ?CvUsers
    {
        return $this->cvUsers;
    }

    public function setCvUsers(CvUsers $cvUsers): static
    {
        // set the owning side of the relation if necessary
        if ($cvUsers->getCvId() !== $this) {
            $cvUsers->setCvId($this);
        }

        $this->cvUsers = $cvUsers;

        return $this;
    }
}
