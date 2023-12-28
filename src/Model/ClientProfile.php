<?php

declare(strict_types=1);

namespace VasilDakov\Econt\Model;

use JMS\Serializer\Annotation as Serializer;
use VasilDakov\Econt\Constants;

final readonly class ClientProfile
{
    public function __construct(
        #[Serializer\Type('int')]
        public ?int $id = null,

        #[Serializer\Type('string')]
        public ?string $name = null,

        #[Serializer\Type('string')]
        public ?string $nameEn = null,

        #[Serializer\Type('array')]
        public ?array $phones = null,

        #[Serializer\Type('string')]
        public ?string $email = null,
    ) {

    }

    public function toArray(): array
    {
        return [
            Constants::ID => $this->id,
            Constants::NAME => $this->name,
            Constants::NAME_EN => $this->nameEn,
            Constants::PHONES => $this->phones,
            Constants::EMAIL => $this->email,
        ];
    }
}
