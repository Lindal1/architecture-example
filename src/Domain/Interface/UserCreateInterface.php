<?php

namespace App\Domain\Interface;

interface UserCreateInterface
{
    public function create(UserCreateCommandInterface $command): UserInterface;
}
