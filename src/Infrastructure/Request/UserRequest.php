<?php

namespace App\Infrastructure\Request;

use App\Model\UserModel;
use App\Model\UserModelInterface;

class UserRequest implements UserRequestInterface, RequestInterface
{
    /* $validators Обьект с набором валидаторов, прокидуется через DI */

    private array $requestData;

    private string $error;

    public function __construct(string $json)
    {
        $this->requestData = json_decode($json, true);
    }

    public function validate(): bool
    {
        $result = UserModel::validate($this->requestData);
        if (is_null($result)) {
            return true;
        }

        $this->error = $result;
        return false;
    }

    public function getError(): string
    {
        return $this->error;
    }

    public function getSignature(): string
    {
        return $this->requestData[UserModel::SIGNATURE];
    }

    public function getUser(): UserModelInterface
    {
        return new UserModel(
            $this->requestData[UserModel::USERNAME],
            $this->requestData[UserModel::PASSWORD]
        );
    }
}
