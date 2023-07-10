<?php

namespace App\Common\Services;

use App\Infrastructure\Exception\InvalidArgumentException;
use App\Processing\ProcessingInterface;

class UserProcessingFactory implements ProcessingFactoryInterface
{
    private array $processings = [];

    /* Может лучше передавать перечень конкретные типов интерфейсов SetProcessingInterface|GetProcessingInterface
       Не делать пустой обобщенный интерфейс */
    public function addProcessing(string $processing, ProcessingInterface $service): void
    {
        if (array_key_exists($processing, $this->processings)) {
            throw new InvalidArgumentException("Processing [{$processing}] exist");
        }

        $this->processings[$processing] = $service;
    }

    public function getProcessing(string $processing): ProcessingInterface
    {
        if (!array_key_exists($processing, $this->processings)) {
            throw new InvalidArgumentException("Processing [{$processing}] does not exist");
        }

        return $this->processings[$processing];
    }
}