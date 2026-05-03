<?php
namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CategoryController extends AbstractController
{
    #[Route('/browse-categories', name: 'app_browse_categories')]
    public function index(CategoryRepository $categoryRepository): Response
    {
        $categories = $categoryRepository->findAll();

        return $this->render('browse_categories.html.twig', [
            'categories' => $categories,
        ]);
    }

    #[Route('/products-by-category/{id}', name: 'app_products_by_category')]
    public function productsByCategory(int $id, CategoryRepository $categoryRepository): Response
    {
        $category = $categoryRepository->find($id);

        return $this->render('products_by_category.html.twig', [
            'category' => $category,
        ]);
    }
}