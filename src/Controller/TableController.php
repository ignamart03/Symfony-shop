<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TableController extends AbstractController {

    #[Route('/table', name: 'app_table')]
    public function index(): Response {
        return $this->render('table/index.html.twig', [
                    'controller_name' => 'TableController',
        ]);
    }

    public function userList(UserRepository $userRepository) {
        $users = $userRepository->findAll();
        return $this->render('user/list.html.twig', [
                    'users' => $users
        ]);
    }

    public function showAction($userId) {
        $product = $this->getDoctrine()
                ->getRepository(Product::class)
                ->find($userId);

        if (!$product) {
            throw $this->createNotFoundException(
                            'No product found for id ' . $userId
            );
        }

        // ... do something, like pass the $product object into a template
    }

}
