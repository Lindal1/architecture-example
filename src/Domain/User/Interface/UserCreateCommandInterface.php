<?php

namespace App\Domain\User\Interface;

interface UserCreateCommandInterface
{
    public function getName(): string;

    public function getEmail(): string;

    public function getPassword(): string;
}