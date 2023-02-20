<?php

namespace App\Controller;

use App\Taxes\Calculator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TestController extends AbstractController
{
    protected $calculator;

    public function __construct(Calculator $calculator)
    {
        $this->calculator = $calculator;
    }

    #[Route('/', name: 'index')]
    public function index()
    {
        $tva = $this->calculator->calcul(100);

        dump($tva);
        
        dd('Ca fonctionne');
    }

    #[Route('test/{age?0}', name: 'test')]
    public function test(Request $request, $age)
    {
        dd($request);
        
        return new Response('Vous avez ' .  $age . ' ans !');
    }
}
