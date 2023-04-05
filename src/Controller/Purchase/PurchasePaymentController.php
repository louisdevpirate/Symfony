<?php

namespace App\Controller\Purchase;

use App\Repository\PurchaseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PurchasePaymentController extends AbstractController
{
    #[Route('/purchase/pay/{id}', name: 'purchase_payment_form')]
    public function showCardForm($id, PurchaseRepository $purchaseRepository)
    {
        $purchase = $purchaseRepository->find($id);

        if (!$purchase) {
            return $this->redirectToRoute('cart_show');
        }

        \Stripe\Stripe::setApiKey('sk_test_51Mt5qnAOvcRLHquyk9lVlkI9CcCrjtTs4Mc3gW36ccah2CkeVrs92X66FwwlY9DQrvTkBC6LT3vmz72HOKWIOd7P009DMFIagj');

        $intent = \Stripe\PaymentIntent::create([
            'amount' => $purchase->getTotal(),
            'currency' => 'eur'
        ]);


        return $this->render('purchase/payment.html.twig', [
            'clientSecret' => $intent->client_secret
        ]);
    }
}
