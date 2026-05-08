<?php

namespace App\Controller;

use App\Cart\CartInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CartController extends AbstractController
{
    public function __construct(
        #[\Symfony\Component\DependencyInjection\Attribute\Autowire(service: 'App\Cart\SessionCart')]
        private CartInterface $cartStrategy
    ) {}

    #[Route('/cart', name: 'app_cart')]
    public function index(): Response
    {
        $cart = $this->cartStrategy->getCart('cart');

        return $this->render('cart.html.twig', [
            'cart' => $cart,
        ]);
    }
}