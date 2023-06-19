<?php

namespace App\Domain\User\Interface;

interface UserFetchInterface
{
    public function getById(int $id): ?UserInterface;

    public function getByEmail(string $email): ?UserInterface;
}