<?php

namespace App\Domain\Interface;

interface UserInterface
{
    public function getId(): ?int;

    public function getEmail(): string;

    public function getName(): string;
}
