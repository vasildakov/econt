<?php

declare(strict_types=1);

namespace VasilDakov\Econt\Model;

use JMS\Serializer\Annotation as Serializer;

final readonly class City
{
    public function __construct(
        #[Serializer\Type('int')]
        public ?int $id = null,

        #[Serializer\Type('string')]
        public ?string $name = null,

        #[Serializer\Type('string')]
        public ?string $nameEn = null,

        #[Serializer\Type('string')]
        public ?string $regionName = null,

        #[Serializer\Type('string')]
        public ?string $regionNameEn = null,

        #[Serializer\Type('string')]
        public ?string $phoneCode = null,

        #[Serializer\Type(Country::class)]
        public ?Country $country = null,

        #[Serializer\Type(GeoLocation::class)]
        public ?GeoLocation $location = null,

        #[Serializer\Type('string',)]
        public ?string $postCode = null
    ) {
    }
}
