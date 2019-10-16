<?php declare(strict_types=1);

namespace App\Controller\Admin;

use Symfony\Component\HttpFoundation\Response;

class AddProduct
{
    public function __invoke()
    {
        return new Response('Hello world');
    }
}
