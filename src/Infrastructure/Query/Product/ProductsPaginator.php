<?php declare(strict_types=1);

namespace App\Infrastructure\Query\Product;

use App\Application\Query\Product\Products;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;

class ProductsPaginator
{
    /** @var int  */
    private const LIMIT_PER_PAGE = 2;

    /** @var Products */
    private $productList;
    /** @var PaginatorInterface */
    private $paginator;

    public function __construct(Products $productList, PaginatorInterface $pagination)
    {
        $this->productList = $productList;
        $this->paginator   = $pagination;
    }

    public function productList(Request $request): PaginationInterface
    {
        return $this->paginator->paginate(
            $this->productList->productList(),
            $request->query->getInt('page', 1),
            self::LIMIT_PER_PAGE
        );
    }

}
