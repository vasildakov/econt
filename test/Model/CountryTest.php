<?php

declare(strict_types=1);

namespace VasilDakov\EcontTest\Model;

use PHPUnit\Framework\TestCase;
use VasilDakov\Econt\Model\Country;

final class CountryTest extends TestCase
{
    /**
     * @test
     */
    public function itCanCreateFromArray(): void
    {
        self::assertInstanceOf(Country::class, Country::fromArray($this->getData()));
    }

    /**
     * @test
     */
    public function itCanReadPublicReadonly(): void
    {
        $country = Country::fromArray($this->getData());

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
