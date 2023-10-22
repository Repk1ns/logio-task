<?php declare(strict_types = 1);

namespace App\Controller;

class ProductController extends \Symfony\Bundle\FrameworkBundle\Controller\AbstractController
{

    private \App\Service\ProductService $productService;

    public function __construct(
        \App\Service\ProductService $productService,
    ) {
        $this->productService = $productService;
    }


    public function detail(int $id): \Symfony\Component\HttpFoundation\Response
    {
        $product = $this->productService->getProduct($id);

        if ($product) {
            return new \Symfony\Component\HttpFoundation\JsonResponse($product->jsonSerialize());
        }

        return new \Symfony\Component\HttpFoundation\Response("Produkt nebyl nalezen.", 404);

    }
}