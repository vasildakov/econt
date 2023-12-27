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
    ){
    }
}
