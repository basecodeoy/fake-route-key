<?php

declare(strict_types=1);

namespace BombenProdukt\FakeRouteKey\Strategies;

use Illuminate\Contracts\Encryption\Encrypter;
use BombenProdukt\FakeRouteKey\Contracts\Strategy;

final class EncrypterStrategy implements Strategy
{
    public function __construct(private readonly Encrypter $encrypter)
    {
        //
    }

    public function encode(mixed $key): string
    {
        return $this->encrypter->encrypt($key);
    }

    public function decode(mixed $value): string
    {
        return (string) $this->encrypter->decrypt($value);
    }
}
