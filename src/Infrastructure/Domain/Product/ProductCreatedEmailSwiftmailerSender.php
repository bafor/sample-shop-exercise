<?php declare(strict_types=1);

namespace App\Infrastructure\Domain\Product;

use App\Domain\Product\Email\ProductCreatedEmailSender;
use App\Domain\Product\Event\ProductCreated;

class ProductCreatedEmailSwiftmailerSender implements ProductCreatedEmailSender
{
    /** @var \Swift_Mailer */
    private $mailer;

    public function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function __invoke(ProductCreated $productCreated): void
    {
        $this->mailer->send(
            (new \Swift_Message('New product added'))
                ->setFrom('send@example.com')
                ->setTo('fake@example.com')
                ->setBody(
                    'Creating email and rendering message, body should be'
                    . ' move to another class, but it\'s just simple exercise'
                )
        );
    }
}
