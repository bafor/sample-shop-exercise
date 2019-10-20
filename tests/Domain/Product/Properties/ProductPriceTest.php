<?php

namespace App\Domain\Product;

use App\Domain\Product\Properties\ProductPrice;
use PHPUnit\Framework\TestCase;

class ProductPriceTest extends TestCase
{

    public function testProductPrice(): void
    {
        $price = new ProductPrice(1000, 'PLN');
        $this->assertEquals(1000, $price->price());
        $this->assertEquals('PLN', $price->currency());
    }

    public function testZeroPrice(): void
    {
        $this->expectException(\DomainException::class);
        $price = new ProductPrice(0, 'USD');
    }

    public function testNegativePrice(): void
    {
        $this->expectException(\DomainException::class);
        $price = new ProductPrice(-5, 'USD');
    }

    public function testWrongCurrency(): void
    {
        $this->expectException(\DomainException::class);
        $price = new ProductPrice(500, 'PL');
    }

}

