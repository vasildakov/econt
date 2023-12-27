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

    public static function fromArray(array $data = []): self
    {
        /*$id       = $data['id'] ?? null;
        $name     = $data['name'] ?? null;
        $postCode = $data['postCode'] ?? null;

        return new self($id, $name, $postCode); */
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
