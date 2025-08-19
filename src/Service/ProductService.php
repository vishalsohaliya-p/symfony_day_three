<?php

namespace App\Service;

use App\Entity\Product;
use App\Repository\ProductRepositoryInterface;

class ProductService
{
    public function __construct(private ProductRepositoryInterface $productRepositoryInterface)
    {

    }

    public function createProduct(string $name, float $price): Product
    {

        $product = new Product()->setName($name)->setPrice($price);
        $this->productRepositoryInterface->save($product);
        
        return $product;
    }

    public function listProducts(): array
    {
        return $this->productRepositoryInterface->findAll();
    }

    public function getExpensiveProducts(float $minPrice): array
    {
        return $this->productRepositoryInterface->findExpensiveProducts($minPrice);
    }
}