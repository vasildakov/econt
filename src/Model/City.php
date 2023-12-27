<?php

declare(strict_types=1);

namespace VasilDakov\Econt\Model;

readonly class City
{
    public function __construct(
        public ?int $id,
        public ?string $name,
        public ?string $postCode
    ) {
    }

    public static function fromArray(array $data = []): self
    {
        $id       = $data['id'] ?? null;
        $name     = $data['name'] ?? null;
        $postCode = $data['postCode'] ?? null;

        return new self($id, $name, $postCode);
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
