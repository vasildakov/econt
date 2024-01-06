<?php

namespace VasilDakov\Econt\Request;

use VasilDakov\Econt\Constants;

class GetQuartersRequest
{
    public function __construct(public readonly string $cityId)
    {
    }

    public function toArray(): array
    {
        return [
            Constants::CITY_ID => $this->cityId,
        ];
    }
}