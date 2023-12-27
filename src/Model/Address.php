<?php

declare(strict_types=1);

namespace VasilDakov\Econt\Model;

use JMS\Serializer\Annotation as Serializer;

final readonly class Address
{
    public function __construct(
        #[Serializer\Type('int')]
        public ?int $id = null,

        #[Serializer\Type(City::class)]
        public ?City $city = null,

        #[Serializer\Type('string')]
        public ?string $fullAddress = null,

        #[Serializer\Type('string')]
        public ?string $fullAddressEn = null,

        #[Serializer\Type('string')]
        public ?string $quarter = null,

        #[Serializer\Type('string')]
        public ?string $street = null,

        #[Serializer\Type('string')]
        public ?string $num = null,

        #[Serializer\Type('string')]
        public ?string $other = null,

        #[Serializer\Type(GeoLocation::class)]
        public ?GeoLocation $location = null,

        #[Serializer\Type('string')]
        public ?string $zip = null,

        #[Serializer\Type('string')]
        public ?string $hezid = null,
    ) {
    }
}
