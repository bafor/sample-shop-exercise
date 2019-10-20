<?php declare(strict_types=1);

namespace App\Domain\Product\Notification;

use Ramsey\Uuid\UuidInterface;

interface ProductCreatedEmailSender
{
    public function notifyAboutNewProduct(UuidInterface $productId): void;
}
