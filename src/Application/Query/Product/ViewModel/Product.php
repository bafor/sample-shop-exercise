<?php declare(strict_types=1);

namespace App\Application\Query\Product\ViewModel;

class Product
{
    /** @var string */
    public $id;

    /** @var string */
    public $name;

    /** @var string */
    public $description;

    /** @var float */
    public $price;

    /** @var string */
    public $currency;

    public function __construct(string $id, string $name, string $description, string $price, string $currency)
    {
        $this->id          = $id;
        $this->name        = $name;
        $this->description = $description;
        $this->price       = ((int)$price) / 100;
        $this->currency    = $currency;
    }

}
