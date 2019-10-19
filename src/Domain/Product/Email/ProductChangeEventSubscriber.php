<?php declare(strict_types=1);

namespace App\Domain\Product\Email;

use App\Domain\Product\Event\ProductCreated;
use Symfony\Component\Messenger\Handler\MessageSubscriberInterface;

class ProductChangeEventSubscriber implements MessageSubscriberInterface
{

    public function sendEmailOnMessageCreated(ProductCreated $productCreated): void
    {
        var_dump('product.created');die();
    }

    public static function getHandledMessages(): iterable
    {
        yield ProductCreated::class => ['method' => 'sendEmailOnMessageCreated'];
    }
}
