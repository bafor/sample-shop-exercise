<?php declare(strict_types=1);

namespace App\Domain\Product\Properties;

class ProductName
{
    /** @var int  */
    private const MIN_DESCRIPTION_LENGTH = 2;
    /** @var int  */
    private const MAX_DESCRIPTION_LENGTH = 255;

    /** @var string */
    private $name;

    public function __construct(string $name)
    {
        if (strlen($name) < self::MIN_DESCRIPTION_LENGTH ||
            strlen($name) > self::MAX_DESCRIPTION_LENGTH) {
            throw new \DomainException('Product description must between 2 and 255 characters long');
        }

        $this->name = $name;
    }

    public function name(): string
    {
        return $this->name;
    }
}
