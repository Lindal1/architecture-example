<?php

namespace App\Domain\Interface;

interface UserSearchInterface
{
    public function search(UserSearchFilterInterface $filter): SearchResultInterface;
}
