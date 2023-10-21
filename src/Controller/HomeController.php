<?php

namespace App\Controller;

use App\Entity\Lieux;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(EntityManagerInterface $entityManager): Response {

        $lieux = $entityManager
            ->getRepository(Lieux::class)
            ->findAll();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'lieux' => $lieux
        ]);
    }

    
}
