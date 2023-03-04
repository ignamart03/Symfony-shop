<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Dish;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

class TableController extends AbstractController {

    private $doctrine;

    public function __construct(ManagerRegistry $doctrine) {
        $this->doctrine = $doctrine;
    }

    #[Route('/table', name: 'app_table')]
    public function index(): Response {
        $dishes = $this->doctrine->getRepository(Dish::class)->findAll();
        return $this->render('table/index.html.twig', [
                    'dishes' => $dishes,
        ]);
    }

    //...
}
