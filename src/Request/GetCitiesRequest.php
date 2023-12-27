<?php

declare(strict_types=1);

namespace VasilDakov\Econt\Request;

use VasilDakov\Econt\Constants;

final readonly class GetCitiesRequest
{
    public function __construct(public string $countryCode)
    {
    }

    public function toArray(): array
    {
        return [
            Constants::COUNTRY_CODE => $this->countryCode
        ];
    }
}
