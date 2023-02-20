<?php

namespace App\Controller;

use App\Taxes\Calculator;
use Cocur\Slugify\Slugify;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class HelloController extends AbstractController
{
    protected $calculator;

    public function __construct(Calculator $calculator)
    {
        $this->calculator = $calculator;
    }

    #[Route('hello/{name?World}', name: 'hello')]
    public function hello($name, LoggerInterface $logger, Slugify $slugify)
    {
        $logger->error('Mon message de log !');

        var_dump($slugify->slugify('Hello World'));

        $tva = $this->calculator->calcul(100);

        dump($tva);

        return new Response('Hello ' .$name.'.');
    }
}