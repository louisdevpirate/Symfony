<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CartController extends AbstractController
{
    #[Route('/cart/add/{id}', name: 'cart_add', requirements: ['id' => "\d+"])]
    public function add($id, ProductRepository $productRepository, SessionInterface $session)
    {

        // 0. Securisation : est ce que le produit existe ?
        $product = $productRepository->find($id);

        if (!$product) {

            throw $this->createNotFoundException("Le produit $id n'existe pas");
        }


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

        return $this->redirectToRoute('product_show', [
            'category_slug' => $product->getCategory()->getSlug(),
            'slug' => $product->getSlug()
        ]);
    }
}
