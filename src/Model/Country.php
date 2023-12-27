<?php

declare(strict_types=1);

namespace VasilDakov\Econt\Model;

use JMS\Serializer\Annotation as Serializer;

readonly class Country
{
    public function __construct(
        #[Serializer\Type('int')]
        public ?int $id = null,

        #[Serializer\Type('string')]
        public ?string $code2 = null,

        #[Serializer\Type('string')]
        public ?string $code3 = null,

        #[Serializer\Type('string')]
        public ?string $name = null,

        #[Serializer\Type('string')]
        public ?string $nameEn = null,

        #[Serializer\Type('bool')]
        public ?bool $isEU = null
    ) {
    }
}
