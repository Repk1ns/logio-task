<?php declare(strict_types = 1);

namespace App\Factory;

class ElasticSearchProductFactory implements \App\Factory\IProductFactory
{
    private \App\Repository\IElasticSearchDriver $elasticSearchDriver;


    public function __construct(
        \App\Repository\IElasticSearchDriver $elasticSearchDriver,
    )
    {

        $this->elasticSearchDriver = $elasticSearchDriver;
    }


    public function getProductById(int $id): ?\App\DTO\Product
    {
        $productData = $this->elasticSearchDriver->findById($id);

        if ($productData === NULL) {
            return new \App\DTO\Product($productData['id'], $productData['name']);
        }

        return NULL;
    }
}