<?php declare(strict_types=1);

namespace App\Domain\Product;

use App\Domain\Product\Properties\ProductDescription;
use App\Domain\Product\Properties\ProductName;
use App\Domain\Product\Properties\ProductPrice;
use Ramsey\Uuid\UuidInterface;

class Product
{
    /** @var UuidInterface */
    private $id;

    /** @var ProductName */
    private $name;

    /** @var ProductDescription */
    private $description;

    /** @var ProductPrice */
    private $price;

    /** @var \DateTimeImmutable */
    private $createdAt;

    public function __construct(
        UuidInterface $id,
        ProductName $name,
        ProductDescription $description,
        ProductPrice $price
    )
    {
        $this->id          = $id;
        $this->name        = $name;
        $this->description = $description;
        $this->price       = $price;

        $this->createdAt = new \DateTimeImmutable();
    }

    public function id(): UuidInterface
    {
        return $this->id;
    }

    public function name(): ProductName
    {
        return $this->name;
    }

    public function description(): ProductDescription
    {
        return $this->description;
    }

    public function price(): ProductPrice
    {
        return $this->price;
    }
}
