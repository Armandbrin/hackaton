<?php

namespace App\DataFixtures;

use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UsersFixtures extends Fixture
{
    private $passhash;

    public function __construct(UserPasswordHasherInterface $passhash){
        $this->passhash = $passhash;
    }

    public function load(ObjectManager $manager): void
    {
        $users = new Users();

        $users->setEmail("a@a.fr");
        $users->setPassword($this->passhash->hashPassword($users, "1234"));
        $users->setCompteBlock("0");
        $users->setRowguid("123456");
        $users->setNom("a");
        $users->setPrenom("a");
        $users->setPoste("soudeur");
        $users->setAge("22");


        $manager->persist($users);
        $manager->flush();
    }
}
