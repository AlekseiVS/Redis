<?php

namespace App\Common\Services;

use App\Action\ActionInterface;
use App\Infrastructure\Exception\InvalidArgumentException;

interface ActionFactoryInterface
{
    public function addAction(string $controller, string $action, ActionInterface $service): void;

    public function getAction(string $controller, string $action): ActionInterface;
}