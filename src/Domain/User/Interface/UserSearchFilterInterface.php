<?php

namespace App\Domain\User\Interface;

interface UserSearchFilterInterface extends PaginationInterface
{
    public function getIds(): array;

    public function getEmail(): ?string;

    public function getName(): ?string;
}
