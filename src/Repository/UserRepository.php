<?php

namespace App\Repository;

use App\Infrastructure\Database\Redis\RedisClientInterface;
use App\Model\UserModelInterface;

class UserRepository implements UserRepositoryInterface
{
    public function __construct(private RedisClientInterface $redisClient)
    {
    }

    public function setUser(UserModelInterface $user)
    {
        $id = $this->redisClient->incr('users');
        /* Запичывает в редин но возвращает null */
        $result = $this->redisClient->hmset($user->getKey($id), $user->getData());
        $response = $this->redisClient->hgetall($user->getKey($id));
        return $response;
    }

}