<?php declare(strict_types=1);

namespace App\UserInterface\Product\Responder;

use Knp\Component\Pager\Pagination\PaginationInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class ProductListResponder
{
    /** @var Environment */
    private $engine;

    public function __construct(Environment $engine)
    {
        $this->engine = $engine;
    }

    public function listProducts(PaginationInterface $products): Response
    {
        return new Response(
            $this->engine->render('product/product_list.html.twig', ['products' => $products])
        );
    }

}
