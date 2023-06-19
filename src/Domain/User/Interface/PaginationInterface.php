<?php

namespace App\Domain\User\Interface;

interface PaginationInterface
{
    public function getLimit(): int;

    public function getOffset(): int;
}