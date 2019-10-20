<?php

namespace App\Domain\Product\Properties;

use PHPUnit\Framework\TestCase;

class ProductNameTest extends TestCase
{

    public function testProductName(): void
    {
        $name = new ProductName('product name');
        $this->assertEquals('product name', $name->name());

        $name = new ProductName('aa');
        $this->assertEquals('aa', $name->name());
    }

    public function testEmptyProductName(): void
    {
        $this->expectException(\DomainException::class);
        $name = new ProductName('');
    }

    public function testSingleLetterProductName(): void
    {
        $this->expectException(\DomainException::class);
        new ProductName('a');
    }

    public function testLongProductName(): void
    {
        $this->expectException(\DomainException::class);
        new ProductName(str_repeat('a', 256));
    }
}
