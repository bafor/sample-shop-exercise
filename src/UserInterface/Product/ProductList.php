<?php declare(strict_types=1);

namespace App\UserInterface\Product;

use App\Infrastructure\Query\Product\ProductsDbalRepository;
use App\UserInterface\Product\Responder\ProductListResponder;
use Symfony\Component\HttpFoundation\Response;

class ProductList
{

    /** @var ProductsDbalRepository */
    private $dbalRepository;
    /** @var ProductListResponder */
    private $responder;

    public function __construct(
        ProductsDbalRepository $dbalRepository,
        ProductListResponder $responder
    )
    {
        $this->dbalRepository = $dbalRepository;
        $this->responder      = $responder;
    }

    public function __invoke(): Response
    {
        return $this->responder->listProducts(
            $this->dbalRepository->productList(1, 1)
        );
    }

}
