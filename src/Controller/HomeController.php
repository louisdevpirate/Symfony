<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name:'homepage')]
    public function homepage(ProductRepository $productRepository)
    {
        $products = $productRepository->findAll();

        dd($products);

        return $this->render('home.html.twig');
        
    }

}