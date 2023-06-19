<?php
declare(strict_types=1);

namespace App\Api\User\Service;

use App\Api\User\Dto\User;
use App\Api\User\Dto\UserCreateRequest;
use App\Domain\User\Interface\UserCreateInterface;

class UserCreateService
{
    public function __construct(
        private readonly UserCreateInterface $createUserService,
    )
    {
    }

    public function create(UserCreateRequest $request): User
    {
        $user = $this->createUserService->create($request);
        return new User(
            $user->id,
            $user->email,
            $user->name,
        );
    }
}
