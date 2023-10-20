<?php declare(strict_types = 1);

namespace App\Controller;

class ProductController extends \Symfony\Bundle\FrameworkBundle\Controller\AbstractController
{

    private \App\Factory\MySQLProductFactory $productFactory;

    public function __construct(
        \App\Factory\MySQLProductFactory $productFactory,
    ) {
        $this->productFactory = $productFactory;
    }


    public function detail(int $id): \Symfony\Component\HttpFoundation\Response
    {
        $product = $this->productFactory->getProductById($id);   

        return new \Symfony\Component\HttpFoundation\Response((string)$product);
    }
}