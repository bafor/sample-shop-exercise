<?php declare(strict_types=1);

namespace App\Domain\Product;

use App\Domain\Product\Properties\ProductDescription;
use App\Domain\Product\Properties\ProductName;
use Ramsey\Uuid\UuidInterface;

class Product
{
    /** @var UuidInterface */
    private $id;

    /** @var string */
    private $name;

    /** @var string */
    private $description;

    /** @var int */
    private $price;

    /** @var string */
    private $currency;

    /** @var \DateTimeImmutable */
    private $createdAt;

    public function __construct(
        UuidInterface $id,
        ProductName $name,
        ProductDescription $description,
        int $price,
        string $currency
    )
    {
        $this->id          = $id;
        $this->name        = $name->name();
        $this->description = $description->description();
        $this->price       = $price;
        $this->currency    = $currency;

        $this->createdAt = new \DateTimeImmutable();
    }

    public function name(): ProductName
    {
        return new ProductName($this->name);
    }

    public function description(): ProductDescription
    {
        return new ProductDescription($this->description);
    }

}
