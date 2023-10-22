<?php declare(strict_types=1);

namespace App\Service;

class ProductVisitsCounter implements \App\Service\IProductVisitsCounter
{

    private \Doctrine\Persistence\ManagerRegistry $doctrine;

    public function __construct(
        \Doctrine\Persistence\ManagerRegistry $doctrine,
    )
    {
        $this->doctrine = $doctrine;
    }

    public function incrementProductVisits(int $id): void
    {
        $productVisitsRepository = $this->doctrine->getRepository(\App\Entity\ProductVisits::class);

        /** @var \App\Entity\ProductVisits|null $productVisits */
        $productVisits = $productVisitsRepository->findOneBy(['productId' => $id]);

        if ($productVisits) {
            $productVisits->setVisitsCount($productVisits->getVisitsCount() + 1);
        } else {
            $productVisits = new \App\Entity\ProductVisits();
            $productVisits->setProductId($id);
            $productVisits->setVisitsCount(1);
        }

        $entityManager = $this->doctrine->getManager();
        $entityManager->persist($productVisits);
        $entityManager->flush();
    }
}