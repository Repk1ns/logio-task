<?php declare(strict_types = 1);

namespace App\Controller;

class ProductController extends \Symfony\Bundle\FrameworkBundle\Controller\AbstractController
{

    private \App\Service\ProductCacheRepository $productCacheRepository;

    public function __construct(
        \App\Service\ProductCacheRepository $productCacheRepository,
    )
    {
        $this->productCacheRepository = $productCacheRepository;
    }


    public function detail(int $id): \Symfony\Component\HttpFoundation\Response
    {
        $product = $this->productCacheRepository->getProduct($id);

        if ($product === NULL) {
            return new \Symfony\Component\HttpFoundation\JsonResponse($product->jsonSerialize());
        }

        return new \Symfony\Component\HttpFoundation\Response("Produkt nebyl nalezen.", 404);

    }
}