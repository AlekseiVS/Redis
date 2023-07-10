<?php

namespace App\Infrastructure\Request;

use App\Model\ModelInterface;

interface RequestInterface
{
    public function validate(): bool;

    public function getSignature(): string;

    public function getError(): string;
}