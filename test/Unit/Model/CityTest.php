<?php

namespace VasilDakov\EcontTest\Unit\Model;

use PHPUnit\Framework\TestCase;
use VasilDakov\Econt\Model\City;
use VasilDakov\Econt\Serializer\SerializerFactory;

class CityTest extends TestCase
{
    /**
     * @test
     */
    public function itCanBeCreatedDeserialized(): void
    {
        $json = json_encode($this->getData());
        $serializer = (new SerializerFactory())();
        $city = $serializer->deserialize($json, City::class, 'json');

        self::assertInstanceOf(City::class, $city);
    }

    /**
     * @test
     */
    public function itCanBeCreatedFromEmptyArray(): void
    {
        self::assertInstanceOf(
            City::class,
            new City(null, null, null, null, null, null, null));
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