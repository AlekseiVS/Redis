<?php

namespace App\Common\Signature;

class Auth implements AuthInterface
{
    public function __construct(private string $signature)
    {
    }

    public function isValid($sign): bool
    {
        return $this->signature === $sign;
    }
}