<?php

namespace App\Cart;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CartService
{
    public function __construct(
        private RequestStack $requestStack,
    ) {
        // Accessing the session in the constructor is *NOT* recommended, since
        // it might not be accessible yet or lead to unwanted side-effects
        // $this->session = $requestStack->getSession();
    }

    public function add(int $id)
    {

        $session = $this->requestStack->getSession();
        // 1. Retrouver le panier dans la session (sous forme de tableau) 
        // 2. Si il n"existe pas encore, alors prendre un tableau vide
        $cart = $session->get('cart', []);

        // [12 => 4, 29 => 3, 40 => 1]

        // 3. Voir si le produit ($id) existe déjà dans le tableau
        // 4. Si c'est le cas, simlplement augmenter la quantité
        // 5. Sinon, ajouter le produit avec la quantité 1
        if (array_key_exists($id, $cart)) {
            $cart[$id]++;
        } else {
            $cart[$id] = 1;
        }

        // 6. Enregistrer le tableau mis à jour dans la session 
        $session->set('cart', $cart);
    }
}
