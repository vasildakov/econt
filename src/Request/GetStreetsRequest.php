<?php

namespace VasilDakov\Econt\Request;

use VasilDakov\Econt\Constants;

final readonly class GetStreetsRequest
{
    public function __construct(public string $cityId)
    {
    }

    public function toArray(): array
    {
        return [
            Constants::CITY_ID => $this->cityId
        ];
    }
}
