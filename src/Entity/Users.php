<?php

namespace App\Entity;

use App\Repository\UsersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UsersRepository::class)]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_EMAIL', fields: ['email'])]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class Users implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    /**
     * @var list<string> The user roles
     */
    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $rowguid = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $compte_block = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(type: Types::BIGINT, nullable: true)]
    private ?string $age = null;

    #[ORM\Column(length: 255)]
    private ?string $poste = null;

    /**
     * @var Collection<int, CvUsers>
     */
    #[ORM\OneToMany(targetEntity: CvUsers::class, mappedBy: 'users_id')]
    private Collection $cvUsers;

    /**
     * @var Collection<int, CompetencesUsers>
     */
    #[ORM\OneToMany(targetEntity: CompetencesUsers::class, mappedBy: 'users_id')]
    private Collection $competencesUsers;

    public function __construct()
    {
        $this->cvUsers = new ArrayCollection();
        $this->competencesUsers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     *
     * @return list<string>
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * @param list<string> $roles
     */
    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getRowguid(): ?string
    {
        return $this->rowguid;
    }

    public function setRowguid(string $rowguid): static
    {
        $this->rowguid = $rowguid;

        return $this;
    }

    public function getCompteBlock(): ?string
    {
        return $this->compte_block;
    }

    public function setCompteBlock(string $compte_block): static
    {
        $this->compte_block = $compte_block;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAge(): ?string
    {
        return $this->age;
    }

    public function setAge(?string $age): static
    {
        $this->age = $age;

        return $this;
    }

    public function getPoste(): ?string
    {
        return $this->poste;
    }

    public function setPoste(string $poste): static
    {
        $this->poste = $poste;

        return $this;
    }

    /**
     * @return Collection<int, CvUsers>
     */
    public function getCvUsers(): Collection
    {
        return $this->cvUsers;
    }

    public function addCvUser(CvUsers $cvUser): static
    {
        if (!$this->cvUsers->contains($cvUser)) {
            $this->cvUsers->add($cvUser);
            $cvUser->setUsersId($this);
        }

        return $this;
    }

    public function removeCvUser(CvUsers $cvUser): static
    {
        if ($this->cvUsers->removeElement($cvUser)) {
            // set the owning side to null (unless already changed)
            if ($cvUser->getUsersId() === $this) {
                $cvUser->setUsersId(null);
            }
        }

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
            $competencesUser->setUsersId($this);
        }

        return $this;
    }

    public function removeCompetencesUser(CompetencesUsers $competencesUser): static
    {
        if ($this->competencesUsers->removeElement($competencesUser)) {
            // set the owning side to null (unless already changed)
            if ($competencesUser->getUsersId() === $this) {
                $competencesUser->setUsersId(null);
            }
        }

        return $this;
    }
}
