<?php

namespace App\Domain\Interface;

interface UserSearchFilterInterface extends PaginationInterface
{
    public function getIds(): array;

    public function getEmail(): ?string;

    public function getName(): ?string;
}
