<?php

namespace App\Processing;

use Symfony\Component\HttpFoundation\JsonResponse;

class ExceptionDecorator implements SetProcessingInterface
{
    public function __construct(private ProcessingInterface $delegate)
    {
    }

    public function setProcessing(?string $json): JsonResponse
    {
        /* Add responseFactory for exception */

        return $this->delegate->setProcessing($json);
    }
}