<?php

namespace App\Common\Services;

use App\Infrastructure\Exception\InvalidArgumentException;
use App\Processing\ProcessingInterface;

interface ProcessingFactoryInterface
{
    public function addProcessing(string $processing, ProcessingInterface $service): void;

    public function getProcessing(string $processing): ProcessingInterface;
}