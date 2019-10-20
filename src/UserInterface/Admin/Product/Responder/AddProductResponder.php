<?php declare(strict_types=1);

namespace App\UserInterface\Admin\Product\Responder;

use Symfony\Component\Form\FormView;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class AddProductResponder
{
    /** @var Environment */
    private $engine;

    public function __construct(Environment $engine)
    {
        $this->engine = $engine;
    }

    public function renderForm(FormView $addProductForm): Response
    {
        return new Response($this->engine->render('admin/product/add_product.html.twig', ['addProductForm' => $addProductForm]));
    }

    public function redirectToList(): Response
    {
        return  new RedirectResponse('/');
    }

}
