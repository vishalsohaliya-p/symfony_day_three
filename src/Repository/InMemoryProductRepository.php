<?php

namespace App\Repository;

use App\Entity\Product;

class InMemoryProductRepository implements ProductRepositoryInterface
{
    private array $products = [];
    private int $autoIncrement = 1;

    public function save(Product $product): void
    {
        if($product->getId() === null)
        {
            $product->setId($this->autoIncrement++);
        }
        $this->products[$product->getId()] = $product;
        
    }

    public function remove(Product $product): void
    {
        unset($this->products[$product->getId()]);
    }

    public function find(int $id): ?Product
    {
        return $this->products[$id] ?? null;
    }

    public function findAll(): array
    {
        return \array_values($this->products);
    }

    public function findExpensiveProducts(float $minPrice): array
    {
        return \array_filter($this->products, fn(Product $p) => $p->getPrice() > $minPrice);
    }

}