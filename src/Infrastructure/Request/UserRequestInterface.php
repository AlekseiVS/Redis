<?php

namespace App\Infrastructure\Request;

use App\Model\UserModelInterface;

interface UserRequestInterface
{
    public function getUser(): UserModelInterface;
}