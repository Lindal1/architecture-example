<?php
declare(strict_types=1);

namespace App\Domain\Entity;

use App\Domain\Interface\UserInterface;

class User implements UserInterface
{
    public function __construct(
        public ?int   $id,
        public string $email,
        public string $password,
        public string $name,
    )
    {
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
