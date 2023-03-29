<?php

namespace App\Controller\Purchase;

use Twig\Environment;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class PurchasesListController extends AbstractController
{
    protected $security;
    protected $router;
    protected $twig;

    public function __construct(Security $security, RouterInterface $router, Environment $twig)
    {
        $this->security = $security;
        $this->router = $router;
        $this->twig = $twig;
    }


    #[Route('/purchases', name: 'purchase_index')]
    public function index()
    {
        // 1. Nous devons nous assurer que la personne est conectée sinon redirection vers page d'Accueil -> Security
        /**
         * @var User
         */
        $user = $this->security->getUser();

        if (!$user) {
            // Générer une URL en fonction du nom d'une route -> UrlGeneratorInterface ou RouterInterface
            throw new AccessDeniedException("Vous deez être connecté pour accéder à vos commandes");
        }
        // 2. Nous voulons savoir qui est connecté -> Security
        // 3. Nous voulons passer l'utilisateur connecté à Twig afin d'afficher ses commandes -> Environment de Twig / Response
        $html = $this->twig->render('purchase/index.html.twig', [
            'purchases' => $user->getPurchases()
        ]);
        return new Response($html);
    }
}
