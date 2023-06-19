<?php

namespace App\Domain\Interface;

interface SearchResultInterface
{
    public function getItems(): array;

    public function getTotalCount(): int;
}
