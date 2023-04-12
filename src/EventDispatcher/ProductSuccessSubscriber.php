<?php

namespace App\EventDispatcher;

use App\Event\ProductViewEvent;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class ProductSuccessSubscriber implements EventSubscriberInterface
{
    protected $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public static function getSubscribedEvents()
    {
        return [
            'product.view' => 'showProduct'
        ];
    }

    public function showProduct(ProductViewEvent $productViewEvent)
    {
        $this->logger->info("Je crois bien qu'on peut fêter l'arrivée du produit " . $productViewEvent->getProduct()->getId());
    }
}
