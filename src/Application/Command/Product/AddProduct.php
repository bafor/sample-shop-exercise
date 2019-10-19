<?php declare(strict_types=1);

namespace App\Application\Command\Product;

use Ramsey\Uuid\UuidInterface;

class AddProduct
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

    public function __construct(UuidInterface $id, string $name, string $description, int $price, string $currency)
    {
        $this->id          = $id;
        $this->name        = $name;
        $this->description = $description;
        $this->price       = $price;
        $this->currency    = $currency;
    }

    public function id(): UuidInterface
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function price(): int
    {
        return $this->price;
    }

    public function currency(): string
    {
        return $this->currency;
    }
}
