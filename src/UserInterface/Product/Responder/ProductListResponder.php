<?php declare(strict_types=1);

namespace App\UserInterface\Product\Responder;

use Symfony\Component\Form\FormView;
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

    public function listProducts(array $products): Response
    {
        return new Response($this->engine->render('product/product_list.html.twig', ['products' => $products]));
    }

}
