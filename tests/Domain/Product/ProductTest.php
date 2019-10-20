<?php

namespace App\Domain\Product;

use App\Domain\Product\Properties\ProductDescription;
use App\Domain\Product\Properties\ProductName;
use App\Domain\Product\Properties\ProductPrice;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

class ProductTest extends TestCase
{

    public function testProductCreation(): void
    {
        $desc = <<<TEXT
Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
 ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderi
TEXT;

        $productId   = Uuid::uuid4();
        $name        = new ProductName('name');
        $description = new ProductDescription($desc);
        $price       = new ProductPrice(1000, 'PLN');

        $product = new Product(
            $productId,
            $name,
            $description,
            $price
        );

        $this->assertTrue($product->id()->equals($productId));
        $this->assertEquals($name->name(), $product->name()->name());
        $this->assertEquals($description->description(), $product->description()->description());
        $this->assertEquals($price->price(), $product->price()->price());
        $this->assertEquals($price->currency(), $product->price()->currency());
    }

}
