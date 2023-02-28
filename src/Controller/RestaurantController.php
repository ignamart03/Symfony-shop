<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Restaurant;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RestaurantController extends AbstractController
{
    #[Route('/restaurant', name: 'app_restaurant')]
    public function createRestaurant(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $restaurant = new Restaurant();
        $restaurant->setName('El Horcher de La Guindalera');
        $restaurant->setEmail('horcherguindalera@gmail.com');
        $restaurant->setAddress('Padre Claret,6');
        $restaurant->setCity('Madrid');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($restaurant);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product with id '.$restaurant->getId());
    }
}