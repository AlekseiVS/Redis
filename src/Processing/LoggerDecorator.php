<?php

namespace App\Processing;

use Symfony\Component\HttpFoundation\JsonResponse;

class LoggerDecorator implements SetProcessingInterface
{
    public function __construct(private ProcessingInterface $delegate)
    {
    }

    public function SetProcessing(?string $json): JsonResponse
    {
        /* Add logger*/

        return $this->delegate->setProcessing($json);
    }
}