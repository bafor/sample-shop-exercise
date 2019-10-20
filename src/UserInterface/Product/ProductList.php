<?php declare(strict_types=1);

namespace App\UserInterface\Product;

use App\Infrastructure\Query\Product\ProductsPaginator;
use App\UserInterface\Product\Responder\ProductListResponder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductList
{
    /** @var ProductListResponder */
    private $responder;
    /** @var ProductsPaginator */
    private $products;

    public function __construct(
        ProductsPaginator $products,
        ProductListResponder $responder
    )
    {
        $this->responder = $responder;
        $this->products  = $products;
    }

    public function __invoke(Request $request): Response
    {
        return $this->responder->listProducts(
            $this->products->productList($request)
        );
    }

}
