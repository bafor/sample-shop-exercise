<?php declare(strict_types=1);

namespace App\Domain\Product\Email;

use App\Domain\Product\Event\ProductCreated;

interface ProductCreatedEmailSender
{
    public function __invoke(ProductCreated $productCreated): void;
}
