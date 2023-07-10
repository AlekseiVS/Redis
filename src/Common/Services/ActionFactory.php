<?php

namespace App\Common\Services;

use App\Action\ActionInterface;
use App\Infrastructure\Exception\InvalidArgumentException;

class ActionFactory implements ActionFactoryInterface
{
    private array $controllers = [];

    /* Может лучше передавать перечень конкретные типов интерфейсов SetActionInterface|GetActionInterface
    Не делать пустой обобщенный интерфейс!!! */
    public function addAction(string $controller, string $action, ActionInterface $service): void
    {
        if (array_key_exists($controller, $this->controllers)
            && array_key_exists($action, $this->controllers[$controller])) {
            throw new InvalidArgumentException("Action [{$action}] exist for controller [{$controller}]");
        }

        $this->controllers[$controller][$action] = $service;
    }

    public function getAction(string $controller, string $action): ActionInterface
    {
        if (!array_key_exists($controller, $this->controllers)
            || !array_key_exists($action, $this->controllers[$controller])) {
            throw new InvalidArgumentException("Action [{$action}] does not exist for controller [{$controller}]");
        }

        return $this->controllers[$controller][$action];
    }
}
