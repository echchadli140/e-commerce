<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ProductController extends AbstractController
{
    #[Route('/product-details', name: 'app_product_details')]
    public function index(): Response
    {
        return $this->render('product_details.html.twig');
    }
}
