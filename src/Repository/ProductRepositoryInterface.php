<?php

namespace App\Repository;

use App\Entity\Product;

interface ProductRepositoryInterface
{
    public function save(Product $product): void;
    public function remove(Product $product): void;
    public function find(int $id): ?Product;
    public function findAll(): array;
    public function findExpensiveProducts(float $minPrice): array;
}