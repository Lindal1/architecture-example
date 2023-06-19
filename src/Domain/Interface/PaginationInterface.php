<?php

namespace App\Domain\Interface;

interface PaginationInterface
{
    public function getLimit(): int;

    public function getOffset(): int;
}