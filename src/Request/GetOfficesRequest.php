<?php

declare(strict_types=1);

namespace VasilDakov\Econt\Request;

use VasilDakov\Econt\Constants;

/**
 * EcontInterface
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
final readonly class GetOfficesRequest
{
    public function __construct(
        public string $countryCode,
        public string $cityId
    ) {
    }

    public function toArray(): array
    {
        return [
            Constants::COUNTRY_CODE => $this->countryCode,
            Constants::CITY_ID => $this->cityId,
        ];
    }
}
