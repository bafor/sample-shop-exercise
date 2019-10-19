<?php declare(strict_types=1);

namespace App\Domain\Product\Properties;

class ProductDescription
{
    private const MIN_DESCRIPTION_LENGTH = 100;

    /** @var string */
    private $description;

    public function __construct(string $description)
    {
        if (strlen($description) < self::MIN_DESCRIPTION_LENGTH) {
            throw new \DomainException('Product description must be at least 100 characters long');
        }

        $this->description = $description;
    }

    public function description(): string
    {
        return $this->description;
    }
}
