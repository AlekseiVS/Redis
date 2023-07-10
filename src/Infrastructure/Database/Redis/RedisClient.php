<?php

namespace App\Infrastructure\Database\Redis;

use Predis\ClientInterface;

class RedisClient implements RedisClientInterface
{
    public function __construct(private ClientInterface $client)
    {
    }

    public function hmset(string $key, array $dictionary) // Проверить что вернет функция и поправить интерфейс. Отдебажить.
    {
        $result = $this->client->hmset($key, $dictionary);
    }

    public function hget(string $key, string $field): string
    {
        return $this->client->hget($key, $field);

    }

    public function incr(string $key): int
    {
        return $this->client->incr($key);
    }

    public function hgetall(string $key): array
    {
        return $this->client->hgetall($key);
    }
}
