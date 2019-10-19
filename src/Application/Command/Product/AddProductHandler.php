<?php declare(strict_types=1);

namespace App\Application\Command\Product;

use App\Domain\Product\Event\ProductCreated;
use App\Domain\Product\Properties\ProductDescription;
use App\Domain\Product\Properties\ProductName;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Component\Messenger\MessageBusInterface;

class AddProductHandler implements MessageHandlerInterface
{
    /** @var \App\Domain\Product\ProductPersister */
    private $persister;
    /** @var MessageBusInterface */
    private $eventBus;

    public function __construct(
        \App\Domain\Product\ProductPersister $persister,
        MessageBusInterface $eventBus
    )
    {
        $this->persister = $persister;
        $this->eventBus  = $eventBus;
    }

    public function __invoke(AddProduct $product)
    {
        $this->persister->save(
            new \App\Domain\Product\Product(
                $product->id(),
                new ProductName($product->name()),
                new ProductDescription($product->description()),
                $product->price(),
                $product->currency()
            )
        );

        $this->eventBus->dispatch(new ProductCreated($product->id()));
    }

}
