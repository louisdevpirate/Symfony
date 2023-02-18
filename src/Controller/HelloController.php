<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class HelloController extends AbstractController
{
    #[Route('hello/{name?World}', name: 'hello')]
    public function hello($name, LoggerInterface $logger)
    {
        $logger->error('Mon message de log !');

        return new Response('Hello ' .$name.'.');
    }
}