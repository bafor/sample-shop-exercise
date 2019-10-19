<?php declare(strict_types=1);

namespace App\Domain\Product;

interface ProductPersister
{
    public function save(Product $product): void;
}
