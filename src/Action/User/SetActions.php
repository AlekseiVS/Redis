<?php

namespace App\Action\User;

use App\Action\SetActionInterface;
use App\Model\ModelInterface;
use App\Repository\UserRepositoryInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class SetActions implements SetActionInterface
{
    public function __construct(private UserRepositoryInterface $userRepository)
    {
    }

    public function set(ModelInterface $user): JsonResponse
    {
        $result = $this->userRepository->setUser($user);

        return new JsonResponse(['OK' => $result]);
    }
}