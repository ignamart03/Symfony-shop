<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Restaurant;

class RestaurantController extends AbstractController {

    #[Route('/restaurant/{codres}', name: 'restaurant_show')]
    public function show(ManagerRegistry $doctrine, int $codres): Response {
        $restaurant = $doctrine->getRepository(Restaurant::class)->find($codres);

        if (!$restaurant) {
            throw $this->createNotFoundException(
                            'No product found for code ' . $codres
            );
        }

        return new Response('Check out this great restaurant: ' . $restaurant->getEmail());

        // or render a template
        // in the template, print things with {{ product.name }}
        // return $this->render('restaurant/show.html.twig', ['product' => $product]);
    }

}
