<?php

namespace App\Controller;

use App\Action\ActionInterface;
use App\Common\Services\ProcessingFactoryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    public function __construct(private ProcessingFactoryInterface $userProcessingFactory)
    {
    }

    #[Route('/users', name: 'set_user', methods: 'POST')]
    public function setUserAction(Request $request): JsonResponse
    {
//        var_dump('aaa'); die;

        $response = $this->userProcessingFactory
            ->getProcessing(ActionInterface::SET_ACTION)
            ->setProcessing($request->getContent());

        return $response;
    }
}
