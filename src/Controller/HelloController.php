<?php

namespace App\Controller;

use App\Taxes\Calculator;
use App\Taxes\Detector;
use Cocur\Slugify\Slugify;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class HelloController extends AbstractController
{
    protected $calculator;

    public function __construct(Calculator $calculator, Detector $detector)
    {
        $this->calculator = $calculator;
        $this->detector = $detector;
    }

    #[Route('hello/{name}', name: 'hello')]
    public function hello($name = "World")
    {
        return $this->render('hello.html.twig', [
            'name' => $name,
            'age' => 10,
            'prenoms' => [
                'Lior',
                'Magali',
                'Elise'
            ]
        ]);
    }
}