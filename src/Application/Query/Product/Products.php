<?php declare(strict_types=1);

namespace App\Application\Query\Product;

use App\Application\Query\Product\ViewModel\Product;

interface Products
{
    /**
     * @return Product[]
     */
    public function productList(): array;
}
