<?php

namespace App\Domain\Product\Properties;

use PHPUnit\Framework\TestCase;

class ProductDescriptionTest extends TestCase
{

    public function testCreateProductDescription(): void
    {
        $description = str_repeat('b', 100);

        $productDescription = new ProductDescription($description);
        $this->assertEquals($description, $productDescription->description());

        $description = str_repeat('b', 1000);

        $productDescription = new ProductDescription($description);
        $this->assertEquals($description, $productDescription->description());
    }

    public function testToShortDescription(): void
    {
        $this->expectException(\DomainException::class);
        new ProductName('a');
    }

}
