<?php declare(strict_types=1);

namespace App\Domain\Product\Notification;

use App\Domain\Product\Event\ProductCreated;
use Symfony\Component\Messenger\Handler\MessageSubscriberInterface;

class ProductChangeEventSubscriber implements MessageSubscriberInterface
{
    /** @var ProductCreatedEmailSender */
    private $emailSender;

    public function __construct(ProductCreatedEmailSender $emailSender)
    {
        $this->emailSender = $emailSender;
    }

    public function sendEmailOnMessageCreated(ProductCreated $productCreated): void
    {
        $this->emailSender->notifyAboutNewProduct($productCreated->productId());
    }

    public static function getHandledMessages(): iterable
    {
        yield ProductCreated::class => ['method' => 'sendEmailOnMessageCreated'];
    }
}
