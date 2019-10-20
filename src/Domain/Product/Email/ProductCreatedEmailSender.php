<?php declare(strict_types=1);

namespace App\Domain\Product\Email;

use App\Domain\Product\Event\ProductCreated;
use Ramsey\Uuid\UuidInterface;

interface ProductCreatedEmailSender
{
    public function notifyAboutNewProduct(UuidInterface $productId): void;
}
