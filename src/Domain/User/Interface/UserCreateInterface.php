<?php

namespace App\Domain\User\Interface;

interface UserCreateInterface
{
    public function create(UserCreateCommandInterface $command): UserInterface;
}
