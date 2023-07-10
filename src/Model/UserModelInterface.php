<?php

namespace App\Model;

interface UserModelInterface extends ModelInterface
{
    public function getUserName(): string;

    public function getPassword(): string;

}