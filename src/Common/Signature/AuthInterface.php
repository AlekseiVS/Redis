<?php

namespace App\Common\Signature;

interface AuthInterface
{
    public function isValid($sign): bool;
}