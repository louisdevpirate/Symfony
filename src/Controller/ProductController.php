<?php

namespace App\Controller;

use App\Entity\Product;
use App\Event\ProductViewEvent;
use App\Form\ProductType;
use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class ProductController extends AbstractController
{
    #[Route('/{slug}', name: 'product_category', priority: -1)]
    public function category($slug, CategoryRepository $categoryRepository): Response
    {
        $category = $categoryRepository->findOneBy([
            'slug' => $slug,
        ]);

        if (!$category) {
            throw $this->createNotFoundException("La catégorie demandée n'existe pas");
        }

        return $this->render('product/category.html.twig', [
            'slug' => $slug,
            'category' => $category,
        ]);
    }

    #[Route('/{category_slug}/{slug}', name: 'product_show', priority: -2)]
    public function show($slug, ProductRepository $productRepository, EventDispatcherInterface $dispatcher): Response
    {
        $product = $productRepository->findOneBy([
            'slug' => $slug,
        ]);

        if (!$product) {
            throw $this->createNotFoundException("Le produit demandé n'existe pas !");
        }

        return $this->render('product/show.html.twig', [
            'product' => $product,
        ]);

        $dispatcher->dispatch(new ProductViewEvent($product), 'product.view');
    }

    #[Route('/admin/product/{id}/edit', name: 'product_edit')]
    #[IsGranted('ROLE_ADMIN', message: "Vous n'avez pas accès à cette ressource")]
    public function edit($id, ProductRepository $productRepository, Request $request, EntityManagerInterface $em)
    {

        $product = $productRepository->find($id);

        $form = $this->createForm(ProductType::class, $product);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em->flush();

            return $this->redirectToRoute('product_show', [
                'category_slug' => $product->getCategory()->getSlug(),
                'slug' => $product->getSlug()
            ]);
        }

        $formView = $form->createView();

        dump($product);

        dump($formView);

        return $this->render('product/edit.html.twig', [
            'product' => $product,
            'formView' => $formView,
        ]);
    }


    #[Route('/admin/product/create', name: 'product_create')]
    public function create(Request $request, SluggerInterface $slugger, EntityManagerInterface $em)
    {
        $product = new Product;

        $form = $this->createForm(ProductType::class, $product);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $product = $form->getData();
            $product->setSlug(strtolower($slugger->slug($product->getName())));

            $em->persist($product);

            $em->flush();

            return $this->redirectToRoute('product_show', [
                'category_slug' => $product->getCategory()->getSlug(),
                'slug' => $product->getSlug()
            ]);
        }



        $formView = $form->createView();

        return $this->render('product/create.html.twig', [
            'formView' => $formView,
        ]);
    }
}
