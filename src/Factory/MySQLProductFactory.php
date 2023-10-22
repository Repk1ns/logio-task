<?php declare(strict_types = 1);

namespace App\Factory;

class MySQLProductFactory implements \App\Factory\IProductFactory
{
    private \App\Repository\IMySQLDriver $mySQLDriver;


    public function __construct(
        \App\Repository\IMySQLDriver $mySQLDriver,
    )
    {
        $this->mySQLDriver = $mySQLDriver;
    }


    public function getProductById(int $id): ?\App\DTO\Product
    {
        $productData = $this->mySQLDriver->findProduct($id);

        if ($productData === NULL) {
            return new \App\DTO\Product($productData['id'], $productData['name']);
        }

        return NULL;
    }
}