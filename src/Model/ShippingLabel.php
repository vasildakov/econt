<?php

declare(strict_types=1);

namespace VasilDakov\Econt\Model;

use JMS\Serializer\Annotation as Serializer;

final readonly class ShippingLabel
{
    public function __construct(
        #[Serializer\Type('string')]
        public ?string $shipmentNumber = null,
    ) {

    }
}