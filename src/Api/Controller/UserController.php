<?php
declare(strict_types=1);

namespace App\Api\Controller;

use App\Api\Dto\UserCreateRequest;
use App\Api\Service\UserCreateService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class UserController extends AbstractController
{
    public function create(
        Request             $request,
        SerializerInterface $serializer,
        ValidatorInterface  $validator,
        UserCreateService   $userService,
    ): JsonResponse
    {
        $createUserDto = $serializer->deserialize($request->getContent(), UserCreateRequest::class, 'json');
        $errors = $validator->validate($createUserDto);
        if ($errors->count() > 0) {
            return $this->json($errors, Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return $this->json($userService->create($createUserDto));
    }
}
