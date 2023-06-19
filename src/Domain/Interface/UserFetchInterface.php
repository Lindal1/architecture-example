<?php

namespace App\Domain\Interface;

interface UserFetchInterface
{
    public function getById(int $id): ?UserInterface;

    public function getByEmail(string $email): ?UserInterface;
}