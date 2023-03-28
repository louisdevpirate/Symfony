<?php

namespace App\Controller;

use App\Cart\CartService;
use App\Repository\ProductRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;

class CartController extends AbstractController
{
    #[Route('/cart/add/{id}', name: 'cart_add', requirements: ['id' => "\d+"])]
    public function add($id, ProductRepository $productRepository, CartService $cartService)
    {

        // 0. Securisation : est ce que le produit existe ?
        $product = $productRepository->find($id);

        if (!$product) {

            throw $this->createNotFoundException("Le produit $id n'existe pas");
        }

        $cartService->add($id);


        /** @var Flashbag $flashbag */
        $this->addFlash('success', 'Le produit a bien été ajouté au panier');

        return $this->redirectToRoute('product_show', [
            'category_slug' => $product->getCategory()->getSlug(),
            'slug' => $product->getSlug()
        ]);
    }

    #[Route('/cart', name: 'cart_show')]
    public function show(CartService $cartService)
    {
        $detailedCart = $cartService->getDetailedCartItems();

        $total = $cartService->getTotal();

        return $this->render('cart/index.html.twig', [
            'items' => $detailedCart,
            'total' => $total,
        ]);
    }
}
