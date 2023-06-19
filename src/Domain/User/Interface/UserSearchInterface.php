<?php

namespace App\Domain\User\Interface;

interface UserSearchInterface
{
    public function search(UserSearchFilterInterface $filter): SearchResultInterface;
}
