<?php

declare(strict_types=1);

namespace VasilDakov\EcontTest\Unit\Model;

use PHPUnit\Framework\TestCase;
use VasilDakov\Econt\Model\Country;

final class CountryTest extends TestCase
{
    /**
     * @test
     */
    public function itCanBeCreated(): void
    {
        self::assertInstanceOf(
            Country::class,
            new Country()
        );
    }

    /**
     * @test
     */
    public function itCanReadPublicReadonly(): void
    {
        $data = $this->getData();
        $country = new Country(
            id: $data['id'],
            code2: $data['code2'],
            code3: $data['code3'],
            name: $data['name'],
            nameEn: $data['nameEn'],
            isEU: $data['isEU']
        );

        self::assertEquals("AT", $country->code2);
        self::assertEquals("AUT", $country->code3);
        self::assertEquals("Austria", $country->nameEn);
        self::assertTrue($country->isEU);
    }

    private function getData(): array
    {
        return [
            "id" => null,
            "code2" => "AT",
            "code3" => "AUT",
            "name" => "Австрия",
            "nameEn" => "Austria",
            "isEU" => true,
        ];
    }
}
