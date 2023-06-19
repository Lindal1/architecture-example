<?php
declare(strict_types=1);

namespace App\Api\Dto;

use App\Domain\Interface\UserInterface;

class UserCreateRequest implements UserInterface
{
    public function __construct(
        public ?string $email,
        public ?string $name,
        public ?string $password,
    )
    {
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getName(): string
    {
        return $this->name;
    }

}
