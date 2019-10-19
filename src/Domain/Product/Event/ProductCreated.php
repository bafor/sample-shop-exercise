<?php declare(strict_types=1);

namespace App\Domain\Product\Event;

use Ramsey\Uuid\UuidInterface;

class ProductCreated
{
    /** @var UuidInterface */
    private $productId;

    public function __construct(UuidInterface $productId)
    {
        $this->productId = $productId;
    }

    public function productId(): UuidInterface
    {
        return $this->productId;
    }
}
