<?php

namespace App\Controller;

use App\Cart\CartInterface;
use App\Cart\CartItem;
use App\Form\AddToCartType;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ProductController extends AbstractController
{
    public function __construct(
        #[\Symfony\Component\DependencyInjection\Attribute\Autowire(service: 'App\Cart\ApiCart')]
        private CartInterface $cartStrategy
    ) {}

    #[Route('/product-details/{id}', name: 'app_product_details')]
    public function index(int $id, ProductRepository $productRepository, Request $request): Response
    {
        $product = $productRepository->find($id);

        $form = $this->createForm(AddToCartType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $quantity = $form->get('quantity')->getData();
            $cartItem = new CartItem($product, $quantity);
            $cart = $this->cartStrategy->getCart('cart');
            $this->cartStrategy->add($cartItem, $cart);

            return $this->redirectToRoute('app_cart');
        }

        return $this->render('product_details.html.twig', [
            'product' => $product,
            'form' => $form->createView(),
        ]);
    }
}