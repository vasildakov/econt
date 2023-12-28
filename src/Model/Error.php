<?php

declare(strict_types=1);

namespace VasilDakov\Econt\Model;

use JMS\Serializer\Annotation as Serializer;
use VasilDakov\Econt\Constants;

final readonly class Error
{
    public function __construct(
        #[Serializer\Type('string')]
        public ?string $type = null,

        #[Serializer\Type('string')]
        public ?string $message = null,

        #[Serializer\Type('string')]
        public ?string $fields = null,

        #[Serializer\Type('string')]
        public ?string $innerErrors = null,
    ) {

    }

    public function toArray(): array
    {
        return [
            Constants::TYPE => $this->type,
            Constants::MESSAGE => $this->message,
            Constants::FIELDS => $this->fields,
            Constants::INNER_ERRORS => $this->innerErrors
        ];
    }
}