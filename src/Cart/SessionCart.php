<?php

namespace App\Cart;

use Symfony\Component\HttpFoundation\RequestStack;

class SessionCart implements CartInterface
{
    public function __construct(private RequestStack $requestStack)
    {
    }

    private function getSession()
    {
        return $this->requestStack->getSession();
    }

    public function add(CartItem $item, Cart $cart): Cart
    {
        $cartItems = $cart->getCartItems();
        $found = false;

        foreach ($cartItems as $existingItem) {
            if ($existingItem->getProduct()->getId() === $item->getProduct()->getId()) {
                $existingItem->setQuantity($existingItem->getQuantity() + $item->getQuantity());
                $found = true;
                break;
            }
        }

        if (!$found) {
            $cart->addCartItem($item);
        }

        $this->getSession()->set($cart->getId(), $cart);
        return $cart;
    }

    public function remove(CartItem $item, Cart $cart): Cart
    {
        $cartItems = array_filter($cart->getCartItems(), function ($existingItem) use ($item) {
            return $existingItem->getProduct()->getId() !== $item->getProduct()->getId();
        });

        $cart->setCartItems(array_values($cartItems));
        $this->getSession()->set($cart->getId(), $cart);
        return $cart;
    }

    public function getCart(string $identifier): Cart
    {
        $cart = $this->getSession()->get($identifier);
        if (!$cart) {
            $cart = new Cart($identifier);
            $this->getSession()->set($identifier, $cart);
        }
        return $cart;
    }

    public function clearCart(string $identifier): void
    {
        $this->getSession()->remove($identifier);
    }
}