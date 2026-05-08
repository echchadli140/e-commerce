<?php

namespace App\Cart;

use App\Entity\Product;

class CartItem
{
    private int $id;
    private Product $product;
    private float $price;
    private int $quantity;

    public function __construct(Product $product, int $quantity = 1)
    {
        $this->product = $product;
        $this->price = $product->getPrice();
        $this->quantity = $quantity;
    }

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }
}