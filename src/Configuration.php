<?php

namespace VasilDakov\Econt;

final class Configuration
{
    public function __construct(
        public string $username,
        public string $password,
    ) {
    }
}
