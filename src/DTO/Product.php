<?php

namespace App\DTO;

class Product implements \JsonSerializable
{
    private int $id;

    private string $name;

    public function __construct(
        int $id,
        string $name,
    )
    {
        $this->id = $id;
        $this->name = $name;
    }


    public function jsonSerialize(): mixed
    {
        return ['product' => [
            'id' => $this->id,
            'name' => $this->name,
            ]
        ];
    }
}