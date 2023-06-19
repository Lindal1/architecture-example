<?php
declare(strict_types=1);

namespace App\Domain\Dto;

use App\Domain\Interface\SearchResultInterface;

class SearchResult implements SearchResultInterface
{
    public function __construct(
        private readonly array $items,
        private readonly int   $totalCount,
    )
    {
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function getTotalCount(): int
    {
        return $this->totalCount;
    }
}
