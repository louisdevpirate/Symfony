<?php

namespace App\Controller\Purchase;

use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PurchasesListController extends AbstractController
{
    #[Route('/purchase', name: 'purchase_index')]
    #[IsGranted("ROLE_USER", message: 'Vous devez être connecté pour accéder à vos commandes')]
    public function index()
    {
        // 1. Nous devons nous assurer que la personne est connectée sinon redirection vers page d'Accueil -> Security
        /**
         * @var User
         */
        $user = $this->getUser();

        // 2. Nous voulons savoir qui est connecté -> Security
        // 3. Nous voulons passer l'utilisateur connecté à Twig afin d'afficher ses commandes -> Environment de Twig / Response
        return $this->render('purchase/index.html.twig', [
            'purchases' => $user->getPurchases()
        ]);
    }
}
