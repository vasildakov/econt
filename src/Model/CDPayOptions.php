<?php

declare(strict_types=1);

namespace VasilDakov\Econt\Model;

use JMS\Serializer\Annotation as Serializer;

final readonly class CDPayOptions
{
    public function __construct(
        #[Serializer\Type('string')]
        public ?string $num,

        #[Serializer\Type(ClientProfile::class)]
        public ?ClientProfile $clientProfile,

        #[Serializer\Type('bool')]
        public ?bool $moneyTransfer,

        #[Serializer\Type('bool')]
        public ?bool $express,

        #[Serializer\Type('string')]
        public ?string $method,

        #[Serializer\Type(Address::class)]
        public ?Address $address,
    ) {

    }
}