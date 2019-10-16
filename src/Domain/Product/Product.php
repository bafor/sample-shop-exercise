<?php declare(strict_types=1);

namespace App\Domain\Product;

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

    public function __construct(UuidInterface $id, string $name, string $description, int $price, string $currency)
    {
        $this->id          = $id;
        $this->name        = $name;
        $this->description = $description;
        $this->price       = $price;
        $this->currency    = $currency;

        $this->createdAt = new \DateTimeImmutable();
    }

}
