<?php

declare(strict_types=1);

namespace VasilDakov\Econt\Model;

use JMS\Serializer\Annotation as Serializer;
use VasilDakov\Econt\Constants;

final readonly class Street
{
    public function __construct(
        #[Serializer\Type('int')]
        public ?int $id = null,

        #[Serializer\Type('int')]
        public ?int $cityId = null,

        #[Serializer\Type('string')]
        public ?string $name = null,

        #[Serializer\Type('string')]
        public ?string $nameEn = null,
    ) {

    }

    public function toArray(): array
    {
        return [
            Constants::ID => $this->id,
            Constants::CITY_ID => $this->cityId,
            Constants::NAME => $this->name,
            Constants::NAME_EN => $this->nameEn,
        ];
    }
}
