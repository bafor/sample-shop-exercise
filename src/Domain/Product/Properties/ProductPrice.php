<?php declare(strict_types=1);

namespace App\Domain\Product\Properties;

class ProductPrice
{
    /** @var int */
    private const CURRENCY_CODE_ISO_4217_LENGTH = 3;
    
    /** @var int */
    private $price;
    /** @var string */
    private $currency;

    public function __construct(int $price, string $currency)
    {
        if (strlen($currency) !== self::CURRENCY_CODE_ISO_4217_LENGTH) {
            throw new \DomainException('Invalid currency');
        }

        if ($price <= 0) {
            throw new \DomainException('Product price must be greater than 0');
        }

        $this->price    = $price;
        $this->currency = $currency;
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
