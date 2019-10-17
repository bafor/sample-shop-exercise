<?php declare(strict_types=1);

namespace App\UserInterface\Product;

use Symfony\Component\HttpFoundation\Response;

class ProductList
{
    public function __invoke()
    {
        return new Response('Product list');
    }

}
