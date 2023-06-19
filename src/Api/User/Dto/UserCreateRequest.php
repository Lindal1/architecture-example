<?php
declare(strict_types=1);

namespace App\Api\User\Dto;


use App\Domain\User\Interface\UserCreateCommandInterface;

class UserCreateRequest implements UserCreateCommandInterface
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

    public function getPassword(): string
    {
        return $this->password;
    }
}
