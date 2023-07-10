<?php

namespace App\Processing\User;

use App\Action\ActionInterface;
use App\Common\Services\ActionFactoryInterface;
use App\Common\Signature\AuthInterface;
use App\Infrastructure\Request\UserRequest;
use App\Processing\AbstractProcessing;
use App\Processing\SetProcessingInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class SetProcessing extends AbstractProcessing implements SetProcessingInterface
{
    public function __construct(
        AuthInterface $auth,
        private ActionFactoryInterface $actionFactory,
    ) {
        parent::__construct($auth);
    }

    public function setProcessing(?string $json): JsonResponse
    {
         $userRequest = $this->deserialize($json, UserRequest::class);
         $result = $this->actionFactory->getAction(
             ActionInterface::USER_CONTROLLER,
             ActionInterface::SET_ACTION
         )->set($userRequest->getUser());

         return $result;

        // Создать ResponseFactory
    }
}