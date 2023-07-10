<?php

namespace App\Processing;

use App\Common\Signature\AuthInterface;
use App\Infrastructure\Exception\InvalidArgumentException;
use App\Infrastructure\Exception\InvalidRequestException;
use App\Infrastructure\Request\RequestInterface;

abstract class AbstractProcessing
{
    public function __construct(protected AuthInterface $auth)
    {
    }

    public function deserialize(?string $json, string $requestClassName): RequestInterface
    {
        if (null === $json || '' === $json) {
            throw new InvalidRequestException('Empty content');
        }

        try {
            $request = new $requestClassName($json);
        } catch (\Throwable $e) {
            throw new InvalidRequestException('Serialize error');
        }

        if (!$request->validate()) {
            throw new InvalidArgumentException($request->getError());
        }
        if (!$this->auth->isValid($request->getSignature())) {
            throw new InvalidRequestException('Invalid signature');
        }

        return $request;
    }
}