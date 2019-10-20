<?php declare(strict_types=1);

namespace App\Application\Command\Product;

use App\Domain\Product\Event\ProductCreated;
use App\Domain\Product\Product;
use App\Domain\Product\ProductPersister;
use App\Domain\Product\Properties\ProductDescription;
use App\Domain\Product\Properties\ProductName;
use App\Domain\Product\Properties\ProductPrice;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Component\Messenger\MessageBusInterface;

class AddProductHandler implements MessageHandlerInterface
{
    /** @var ProductPersister */
    private $persister;
    /** @var MessageBusInterface */
    private $eventBus;

    public function __construct(
        ProductPersister $persister,
        MessageBusInterface $eventBus
    )
    {
        $this->persister = $persister;
        $this->eventBus  = $eventBus;
    }

    public function __invoke(AddProduct $product)
    {
        $this->persister->save(
            new Product(
                $product->id(),
                new ProductName($product->name()),
                new ProductDescription($product->description()),
                new ProductPrice(
                    $product->price(),
                    $product->currency()
                )
            )
        );

        $this->eventBus->dispatch(new ProductCreated($product->id()));
    }

}
