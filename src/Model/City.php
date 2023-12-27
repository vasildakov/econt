<?php

declare(strict_types=1);

namespace VasilDakov\Econt\Model;

use JMS\Serializer\Annotation as Serializer;

readonly class City
{
    public function __construct(
        #[Serializer\Type('int')]
        public ?int $id,

        #[Serializer\Type('string')]
        public ?string $name,

        #[Serializer\Type('string')]
        public ?string $nameEn,

        #[Serializer\Type('string')]
        public ?string $regionName,

        #[Serializer\Type('string')]
        public ?string $regionNameEn,

        #[Serializer\Type('string')]
        public ?string $phoneCode,

        #[Serializer\Type('string',)]
        public ?string $postCode
    ) {
    }
}
