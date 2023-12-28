<?php

declare(strict_types=1);

namespace VasilDakov\Econt\Model;

use JMS\Serializer\Annotation as Serializer;

readonly class GeoLocation
{
    public function __construct(
        #[Serializer\Type('float')]
        public ?float $latitude = null,

        #[Serializer\Type('float')]
        public ?float $longitude = null,

        #[Serializer\Type('int')]
        public ?int $confidence = null,
    ) {
    }
}
