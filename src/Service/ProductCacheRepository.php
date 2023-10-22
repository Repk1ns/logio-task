<?php declare(strict_types=1);

namespace App\Service;

class ProductCacheRepository
{
    private \App\Factory\IProductFactory $productFactory;
    private \Symfony\Contracts\Cache\CacheInterface $cache;

    public function __construct(
        \App\Factory\IProductFactory $productFactory,
        \Symfony\Contracts\Cache\CacheInterface $cache,
    )
    {

        $this->productFactory = $productFactory;
        $this->cache = $cache;
    }

    public function getProduct(int $id): ?\App\DTO\Product
    {
        return $this->cache->get('product_' . $id, function (\Symfony\Contracts\Cache\ItemInterface $item) use ($id) {
            $product = $this->productFactory->getProductById($id);

            if ($product !== NULL) {
                $item->expiresAfter(3600);

                return $product;
            }

            return NULL;
        });
    }

}