<?php

namespace App\Model;

interface ModelInterface
{
    public function setId(string $id): void;

    public function getId(): ?string;

    public function getKey(string $id): ?string;

    public function getData(): array;

    public static function getRequiredFields(): array;

    public static function validate(array $requestData): ?string;
}