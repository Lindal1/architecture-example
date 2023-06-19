<?php

namespace App\Domain\Interface;

interface UserCreateCommandInterface
{
    public function getName(): string;

    public function getEmail(): string;

    public function getPassword(): string;
}