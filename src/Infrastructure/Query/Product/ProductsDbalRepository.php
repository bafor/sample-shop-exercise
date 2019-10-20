<?php declare(strict_types=1);

namespace App\Infrastructure\Query\Product;

use App\Application\Query\Product\Products;
use App\Application\Query\Product\ViewModel\Product;
use Doctrine\DBAL\Driver\Connection;
use Doctrine\DBAL\FetchMode;

class ProductsDbalRepository implements Products
{
    /** @var Connection */
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @param int $page
     * @param int $limit
     * @return Product[]
     */
    public function productList(int $page = 1, int $limit = 10): array
    {
        $sql  = <<<SQL
        SELECT 
            id, name, description, price, currency 
        FROM 
            shop_product
        ORDER BY 
            id desc
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
