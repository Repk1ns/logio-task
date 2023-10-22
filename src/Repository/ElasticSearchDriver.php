<?php declare(strict_types = 1);

namespace App\Repository;

class ElasticSearchDriver implements \App\Repository\IElasticSearchDriver
{
    public function findById(int $id): array
    {
        $product = [
            'id' => $id,
            'name' => 'Test Product from ElasticSearch',
        ];

        return $product;
    }
}