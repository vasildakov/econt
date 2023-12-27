<?php

namespace VasilDakov\Econt;

final readonly class Configuration
{
    public function __construct(
        public string $username,
        public string $password,
    ) {
    }
}
