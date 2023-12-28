<?php

declare(strict_types=1);

namespace VasilDakov\Econt\Model;

use JMS\Serializer\Annotation as Serializer;

final readonly class Instruction
{
    public function __construct(
        #[Serializer\Type('int')]
        public ?int $id = null,

        #[Serializer\Type('string')]
        public ?string $type = null,

        #[Serializer\Type('string')]
        public ?string $title = null,

        #[Serializer\Type('string')]
        public ?string $description = null,

        #[Serializer\Type('array')]
        public ?array $attachments = [],
    ) {

    }
}