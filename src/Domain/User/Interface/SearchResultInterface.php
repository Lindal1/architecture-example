<?php

namespace App\Domain\User\Interface;

interface SearchResultInterface
{
    public function getItems(): array;

    public function getTotalCount(): int;
}
