<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Créer les catégories
        $electronics = new Category();
        $electronics->setName('Electronics');
        $electronics->setDescription('Headphones, speakers, gadgets and more');
        $manager->persist($electronics);

        $fashion = new Category();
        $fashion->setName('Fashion');
        $fashion->setDescription('Clothing, accessories and footwear');
        $manager->persist($fashion);

        $sports = new Category();
        $sports->setName('Sports & Fitness');
        $sports->setDescription('Workout gear, yoga mats and equipment');
        $manager->persist($sports);

        // Créer les produits
        $product1 = new Product();
        $product1->setName('Wireless Headphones');
        $product1->setDescription('Experience premium sound quality with our wireless headphones.');
        $product1->setPrice(79.99);
        $product1->setCategory($electronics);
        $manager->persist($product1);

        $product2 = new Product();
        $product2->setName('Bluetooth Speaker');
        $product2->setDescription('Portable bluetooth speaker with amazing sound.');
        $product2->setPrice(59.99);
        $product2->setCategory($electronics);
        $manager->persist($product2);

        $product3 = new Product();
        $product3->setName('Wireless Mouse');
        $product3->setDescription('Ergonomic wireless mouse for productivity.');
        $product3->setPrice(29.99);
        $product3->setCategory($electronics);
        $manager->persist($product3);

        $product4 = new Product();
        $product4->setName('Running Shoes');
        $product4->setDescription('Lightweight and comfortable running shoes.');
        $product4->setPrice(89.99);
        $product4->setCategory($sports);
        $manager->persist($product4);

        $product5 = new Product();
        $product5->setName('Yoga Mat');
        $product5->setDescription('Non-slip yoga mat for all types of exercise.');
        $product5->setPrice(24.99);
        $product5->setCategory($sports);
        $manager->persist($product5);

        $product6 = new Product();
        $product6->setName('Winter Jacket');
        $product6->setDescription('Warm and stylish winter jacket.');
        $product6->setPrice(129.99);
        $product6->setCategory($fashion);
        $manager->persist($product6);

        $manager->flush();
    }
}