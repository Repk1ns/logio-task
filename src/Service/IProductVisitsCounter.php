<?php declare(strict_types=1);

namespace App\Service;

interface IProductVisitsCounter
{
    public function incrementProductVisits(int $id): void;

}