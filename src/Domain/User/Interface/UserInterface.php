<?php

namespace App\Domain\User\Interface;

interface UserInterface
{
    public function getId(): ?int;

    public function getEmail(): string;

    public function getName(): string;
}
