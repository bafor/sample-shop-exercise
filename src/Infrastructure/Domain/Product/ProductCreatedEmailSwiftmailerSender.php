<?php declare(strict_types=1);

namespace App\Infrastructure\Domain\Product;

use App\Domain\Product\Notification\ProductCreatedEmailSender;
use Ramsey\Uuid\UuidInterface;

class ProductCreatedEmailSwiftmailerSender implements ProductCreatedEmailSender
{
    /** @var \Swift_Mailer */
    private $mailer;

    public function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function notifyAboutNewProduct(UuidInterface $productId): void
    {
        $this->mailer->send(
            (new \Swift_Message('New product added: ' . $productId->toString()))
                ->setFrom('send@example.com')
                ->setTo('fake@example.com')
                ->setBody(
                    'Creating email and rendering message body should be'
                    . ' move to another class, but it\'s just simple exercise...'

                )
        );
    }
}
