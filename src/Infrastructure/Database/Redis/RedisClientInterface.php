<?php

namespace App\Infrastructure\Database\Redis;

interface RedisClientInterface
{
    public function hmset(string $key, array $dictionary);

    public function hget(string $key, string $field): string;

    public function incr(string $key): int;

    public function hgetall(string $key): array;

}