<?php

namespace App\Controller;

use App\Entity\Users;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(): Response
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    #[Route('/profil', name: 'app_profil')]
    public function profil(EntityManagerInterface $entity): Response
    {
        $users = $entity->getRepository(Users::class)->findAll();

        return $this->render('main/profil.html.twig', [
            'controller_name' => 'MainController',
            "users" => $users,
        ]);
    }
}
