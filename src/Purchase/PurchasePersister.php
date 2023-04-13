<?php

namespace App\Purchase;

use DateTimeImmutable;
use App\Entity\Purchase;
use App\Cart\CartService;
use App\Entity\PurchaseItem;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PurchasePersister extends AbstractController
{
    protected $cartService;
    protected $em;
    protected $security;

    public function __construct(EntityManagerInterface $em, CartService $cartService, Security $security)
    {
        $this->em = $em;
        $this->cartService = $cartService;
        $this->security = $security;
    }

    public function storePurchase(Purchase $purchase)
    {
        // 6. Nous allons la lier avec l'utilisateur actuellement connecté (Security) 
        $purchase->setUser($this->security->getUser());

        $this->em->persist($purchase);

        // 7. Nous allons la lier avec les produits qui sont dans le panier (CartService)
        foreach ($this->cartService->getDetailedCartItems() as $cartItem) {
            $purchaseItem = new PurchaseItem;
            $purchaseItem->setPurchase($purchase)
                ->setProduct($cartItem->product)
                ->setProductName($cartItem->product->getName())
                ->setProductPrice($cartItem->product->getPrice())
                ->setQuantity($cartItem->qty)
                ->setTotal($cartItem->getTotal());

            $this->em->persist($purchaseItem);
        }

        // 8. Nous allons enregistrer la commande (EntityManagerInterface)
        $this->em->flush();
    }
}
