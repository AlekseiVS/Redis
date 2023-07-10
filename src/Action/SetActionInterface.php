<?php

namespace App\Action;

use App\Model\ModelInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

interface SetActionInterface extends ActionInterface
{
    public function set(ModelInterface $user): JsonResponse;
}
