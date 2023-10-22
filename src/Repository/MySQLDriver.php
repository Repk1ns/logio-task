<?php declare(strict_types = 1);

namespace App\Repository;

class MySQLDriver implements \App\Repository\IMySQLDriver
{
    public function findProduct(int $id): array
    {
        $product = [
            'id' => $id,
            'name' => 'Test Product from MySQL',
        ];

        return $product;
    }
}