<?php


namespace App\Doctrine\Listener;

use App\Entity\Category;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Component\String\Slugger\SluggerInterface;


class CategorySlugListener
{
    protected $slugger;

    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }

    public function prePersist(Category $category, LifecycleEventArgs $event)
    {
        $category = $event->getObject();

        if (!$category instanceof Category) {
            return;
        }

        if (empty($category->getSlug())) {

            // SluggerInterface
            $category->setSlug(strtolower($this->slugger->slug($category->getName())));
        }
    }
}
