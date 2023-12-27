<?php

declare(strict_types=1);

namespace VasilDakov\Econt\Model;

use JMS\Serializer\Annotation as Serializer;

readonly class Office
{
    public function __construct(
        #[Serializer\Type('int')]
        public ?int $id = null,

        #[Serializer\Type('string')]
        public ?string $code = null,

        #[Serializer\Type('string')]
        public ?string $name = null,

        #[Serializer\Type('string')]
        public ?string $nameEn = null,

        #[Serializer\Type('bool')]
        public ?bool $isMPS = null,

        #[Serializer\Type('bool')]
        public ?bool $isAPS = null,

        #[Serializer\Type('array')]
        public ?array $phones = null,

        #[Serializer\Type('array')]
        public ?array $emails = null,

        #[Serializer\Type(Address::class)]
        public ?Address $address = null,

        #[Serializer\Type('string')]
        public ?string $info = null,

        #[Serializer\Type('string')]
        public ?string $currency = null,

        #[Serializer\Type('string')]
        public ?string $language = null,

        #[Serializer\Type('int')]
        public ?int $normalBusinessHoursFrom = null,

        #[Serializer\Type('int')]
        public ?int $normalBusinessHoursTo = null,

        #[Serializer\Type('array')]
        public ?array $shipmentTypes = null,

        #[Serializer\Type('string')]
        public ?string $partnerCode = null,

        #[Serializer\Type('string')]
        public ?string $hubCode = null,

        #[Serializer\Type('string')]
        public ?string $hubName = null,

        #[Serializer\Type('string')]
        public ?string $hubNameEn = null,

        #[Serializer\Type('bool')]
        public ?bool $isDrive = null,
    ){
    }
}
