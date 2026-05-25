<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CategoryController extends AbstractController
{
    #[Route('/browse-categories', name: 'app_browse_categories')]
    public function index(): Response
    {
        return $this->render('browse_categories.html.twig');
    }

    #[Route('/products-by-category', name: 'app_products_by_category')]
    public function productsByCategory(): Response
    {
        return $this->render('products_by_category.html.twig');
    }
}
