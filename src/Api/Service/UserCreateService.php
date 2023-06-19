<?php
declare(strict_types=1);

namespace App\Api\Service;

use App\Api\Dto\UserCreateRequest;
use App\Api\Dto\User;
use App\Domain\Interface\UserCreateInterface;

class UserCreateService
{
    public function __construct(
        private readonly UserCreateInterface $createUserService,
    )
    {
    }

    public function create(UserCreateRequest $createUserRequest): User
    {
        $user = $this->createUserService->create(
            new UserEntity(
                null,
                $createUserRequest->email,
                $createUserRequest->password,
                $createUserRequest->name,
            ),
        );
        return new User(
            $user->id,
            $user->email,
            $user->name,
        );
    }
}
