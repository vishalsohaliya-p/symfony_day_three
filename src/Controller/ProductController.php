<?php

namespace App\Controller;

use App\Service\ProductService;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class ProductController extends AbstractController
{
    public function __construct(private ProductService $productService, private LoggerInterface $loggerInterface)
    {
        
    }

    #[Route("/products", name:"product_index")]
    public function index(): JsonResponse
    {
        $this->loggerInterface->info('Creating demo products');

        $this->productService->createProduct("Mobile", 23000);
        //$this->productService->createProduct("Laptop", 260.60);

        $this->loggerInterface->debug('All products retrieved', [
            'products' => $this->productService->listProducts()
        ]);

        return $this->json($this->productService->listProducts());
    }

    #[Route("/products/expensive", name:"product_expensive")]
    public function expensive(): JsonResponse
    {
        return new JsonResponse($this->productService->getExpensiveProducts(500));
    }
}