<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategoryController extends AbstractController
{
    #[Route('/admin/category/create', name: 'category_create')]
    public function create(){
        
        return $this->render('category/create.html.twig');
    }

    #[Route('/admin/category/{id}/edit', name:'category_edit')]
    public function edit($id, CategoryRepository $categoryRepository){

        $category = $categoryRepository->find($id);

        return $this->render('category/edit.html.twig', [
            'category' => $category,
        ]);
    }
};
