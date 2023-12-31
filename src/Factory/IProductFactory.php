<?php declare(strict_types = 1);

namespace App\Factory;

interface IProductFactory
{
    public function getProductById(int $id): ?\App\DTO\Product;
}