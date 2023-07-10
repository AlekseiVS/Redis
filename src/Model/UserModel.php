<?php

namespace App\Model;

class UserModel implements UserModelInterface
{
    public const USERNAME = 'username';
    public const PASSWORD = 'password';
    public const SIGNATURE = 'signature';

    private const REQUIRED_FIELDS = [self::USERNAME, self::PASSWORD, self::SIGNATURE];

    private const KEY = 'user:';

    private ?string $id = null;

    private array $fields = [];

    public function __construct(private string $userName, private string $password)
    {
    }

    public function getUserName(): string
    {
        return $this->userName;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getKey(string $id): ?string
    {
        if (!is_null($id)) {
            return self::KEY . $id;
        }

        return null;
    }

    public function getData(): array
    {
        return [
            self::USERNAME => $this->userName,
            self::PASSWORD => $this->password,
        ];
    }

    public static function getRequiredFields(): array
    {
        return self::REQUIRED_FIELDS;
    }

    public static function validate(array $requestData): ?string
    {
        /* Временный примерный валидатор */

        foreach (self::getRequiredFields() as $field) {
            if (!array_key_exists($field, $requestData)) {
                return "{$field} is required";
            }
        }

        return null;
    }
}
