<?php

namespace App\Processing;

use Symfony\Component\HttpFoundation\JsonResponse;

interface SetProcessingInterface extends ProcessingInterface
{
    public function setProcessing(?string $json): JsonResponse;
}