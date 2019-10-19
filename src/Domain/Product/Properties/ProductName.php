<?php declare(strict_types=1);

namespace App\Domain\Product\Properties;

class ProductName
{
    private const MIN_DESCRIPTION_LENGTH = 2;

    /** @var string */
    private $name;

    public function __construct(string $name)
    {
        if (strlen($name) < self::MIN_DESCRIPTION_LENGTH) {
            throw new \DomainException('Product description must be at least 100 characters long');
        }

        $this->name = $name;
    }

    public function name(): string
    {
        return $this->name;
    }
}
