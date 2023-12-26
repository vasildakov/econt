<?php

namespace VasilDakov\Econt\Model;

final class Country
{
    /*
    id	int	[0..1]
    code2	string	[0..1] ISO 3166-1 alpha-2 code (e.g. BG, GB, GR)
    code3	string	[0..1] ISO 3166-1 alpha-3 code (e.g. BGR ,GBR, GRC)
    name	string	[0..1] The bulgarian name of the country
    nameEn	string	[0..1] The international name of the country
    isEU	boolean	[0..1] True if country is a member of the EU
    */

    public function __construct(
        public readonly ?int $id,
        public readonly ?string $code2,
        public readonly ?string $code3,
        public readonly ?string $name,
        public readonly ?string $nameEn,
        public readonly ?bool $isEU
    ) {
    }

    public static function fromArray(array $data): Country
    {
        list($id, $code2, $code3, $name, $nameEn, $isEU) = array_values($data);

        return new Country($id, $code2, $code3, $name, $nameEn, $isEU);
    }
}
