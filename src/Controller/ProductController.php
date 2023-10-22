<?php declare(strict_types = 1);

namespace App\Controller;

class ProductController extends \Symfony\Bundle\FrameworkBundle\Controller\AbstractController
{

    private \App\Service\ProductCacheRepository $productCacheRepository;
    private \App\Service\IProductVisitsCounter $productVisitsCounter;

    public function __construct(
        \App\Service\ProductCacheRepository $productCacheRepository,
        \App\Service\IProductVisitsCounter $productVisitsCounter,
    )
    {
        $this->productCacheRepository = $productCacheRepository;
        $this->productVisitsCounter = $productVisitsCounter;
    }


    public function detail(int $id): \Symfony\Component\HttpFoundation\Response
    {
        $product = $this->productCacheRepository->getProduct($id);

        if ($product !== NULL) {
            $this->productVisitsCounter->incrementProductVisits($id);

            return new \Symfony\Component\HttpFoundation\JsonResponse($product->jsonSerialize());
        }

        return new \Symfony\Component\HttpFoundation\Response("Produkt nebyl nalezen.", 404);

    }
}