<?php declare(strict_types=1);

namespace App\Infrastructure\Query\Product;

use App\Application\Query\Product\Products;
use App\Application\Query\Product\ViewModel\Product;
use App\UserInterface\Product\ProductList;
use Doctrine\DBAL\Driver\Connection;
use Doctrine\DBAL\FetchMode;

class ProductsPaginator implements Products
{
    /** @var Connection */
    private $connection;

    public function __construct(ProductList $productList)
    {
        $this->connection = $connection;
    }

    /**
     * @param int $page
     * @param int $limit
     * @return \App\Application\Query\Product\ViewModel\Product[]
     */
    public function productList(): array
    {
        $sql  = <<<SQL
        SELECT id, name, description, price, currency FROM shop_product
        ORDER BY id desc
SQL;
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();

        return array_map(
            function (array $row): Product {
                return new Product(... $row);
            },
            $stmt->fetchAll(FetchMode::NUMERIC)
        );
    }

}
