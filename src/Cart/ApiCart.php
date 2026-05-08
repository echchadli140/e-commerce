<?php

namespace App\Cart;

class ApiCart implements CartInterface
{
    public function add(CartItem $item, Cart $cart): Cart
    {
        dd('ApiCart::add', $item, $cart);
    }

    public function remove(CartItem $item, Cart $cart): Cart
    {
        dd('ApiCart::remove', $item, $cart);
    }

    public function getCart(string $identifier): Cart
    {
        dd('ApiCart::getCart', $identifier);
    }

    public function clearCart(string $identifier): void
    {
        dd('ApiCart::clearCart', $identifier);
    }
}