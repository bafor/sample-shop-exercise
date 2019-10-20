<?php declare(strict_types=1);

namespace App\UserInterface\Admin\Product;

use App\Application\Command\Product\AddProduct;
use App\UserInterface\Admin\Product\Form\AddProductForm;
use App\UserInterface\Admin\Product\Form\Model\ProductDetails;
use App\UserInterface\Admin\Product\Responder\AddProductResponder;
use Ramsey\Uuid\Uuid;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Messenger\MessageBusInterface;

class AddProductAction
{
    /** @var FormFactoryInterface */
    private $formFactory;
    /** @var AddProductResponder */
    private $responder;
    /** @var MessageBusInterface */
    private $commandBus;

    public function __construct(
        FormFactoryInterface $formFactory,
        AddProductResponder $responder,
        MessageBusInterface $commandBus
    )
    {
        $this->formFactory = $formFactory;
        $this->responder   = $responder;
        $this->commandBus  = $commandBus;
    }

    public function __invoke(Request $request)
    {
        $form = $this->formFactory->create(AddProductForm::class, new ProductDetails());
        $form->handleRequest($request);

        if (!$form->isSubmitted() || !$form->isValid()) {
            return $this->responder->renderForm($form->createView());
        }

        /** @var ProductDetails $details */
        $details = $form->getData();

        $productId = Uuid::uuid4();

        $this->commandBus->dispatch(
            new AddProduct(
                $productId,
                $details->name,
                $details->description,
                (int)$details->price,
                $details->currency
            )
        );

        return $this->responder->redirectToList();
    }
}
