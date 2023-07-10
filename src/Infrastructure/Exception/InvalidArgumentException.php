<?php

namespace App\Infrastructure\Exception;

use Throwable;

class InvalidArgumentException extends \Exception
{
    private string $messages;

    public function __construct(string $message, int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct("Invalid argument", $code, $previous);
        $this->messages = $message;
    }

    public function getMessages(): string
    {
        return $this->messages;
    }
}