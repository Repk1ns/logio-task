<?php

namespace App\DTO;

class Product implements \JsonSerializable
{
    private int $id;

    private string $name;


    public function getId(): int
    {
        return $this->id;
    }


    public function setId(int $id): void
    {
        $this->id = $id;
    }


    public function getName(): string
    {
        return $this->name;
    }


    public function setName(string $name): void
    {
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