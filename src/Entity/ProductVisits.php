<?php declare(strict_types = 1);

namespace App\Entity;

/**
 * @\Doctrine\ORM\Mapping\Entity
 * @\Doctrine\ORM\Mapping\Table(name="productVisits")
 */
class ProductVisits
{

    /**
     * @\Doctrine\ORM\Mapping\Id()
     * @\Doctrine\ORM\Mapping\GeneratedValue()
     * @\Doctrine\ORM\Mapping\Column(type="integer")
     */
    private int $id;

    /**
     * @\Doctrine\ORM\Mapping\Column(type="integer")
     */
    private int $productId;


    /**
     * @\Doctrine\ORM\Mapping\Column(type="integer")
     */
    private int $visitsCount;


    public function getProductId(): int
    {
        return $this->productId;
    }


    public function setProductId(int $productId): void
    {
        $this->productId = $productId;
    }


    public function getVisitsCount(): int
    {
        return $this->visitsCount;
    }


    public function setVisitsCount(int $visitsCount): void
    {
        $this->visitsCount = $visitsCount;
    }


}