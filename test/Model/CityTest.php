<?php

namespace VasilDakov\EcontTest\Model;

use PHPUnit\Framework\TestCase;
use VasilDakov\Econt\Model\City;

class CityTest extends TestCase
{
    /**
     * @test
     */
    public function itCanBeCreatedFromArray(): void
    {
        $city = City::fromArray($this->getData());

        self::assertInstanceOf(City::class, $city);
    }

    /**
     * @test
     */
    public function itCanBeCreatedFromEmptyArray(): void
    {
        $city = City::fromArray([]);

        self::assertInstanceOf(City::class, $city);
    }


    /**
     * @test
     */
    public function itCanBeConvertedToArray(): void
    {
        $city = City::fromArray([]);
        $array = $city->toArray();

        self::assertIsArray($array);
        self::assertArrayHasKey('id', $array);
        self::assertArrayHasKey('name', $array);
        self::assertArrayHasKey('postCode', $array);
    }


    private function getData(): array
    {
        return [
            "id" => 204964,
            "name" => "Sofia",
            "postCode" => "1000",
        ];
    }
}