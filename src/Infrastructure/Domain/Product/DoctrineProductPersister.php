<?php declare(strict_types=1);

namespace App\Infrastructure\Domain\Product;

use App\Domain\Product\Product;
use App\Domain\Product\ProductPersister;
use Doctrine\ORM\EntityManagerInterface;

class DoctrineProductPersister implements ProductPersister
{
    /** @var EntityManagerInterface */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function save(Product $product): void
    {
        $this->entityManager->persist($product);
    }
}
