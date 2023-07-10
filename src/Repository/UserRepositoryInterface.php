<?php

namespace App\Repository;

use App\Model\UserModelInterface;

interface UserRepositoryInterface
{
    public function setUser(UserModelInterface $user);
}