<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController
{
    #[Route('/', name: 'index')]
    public function index()
    {
        dd('Ca fonctionne');
    }

    #[Route('test/{age?0}', name: 'test')]
    public function test(Request $request, $age)
    {
        return new Response('Vous avez ' .  $age . ' ans !');
    }
}
