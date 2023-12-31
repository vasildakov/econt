<?php

declare(strict_types=1);

namespace VasilDakov\EcontTest\Unit\Model;

use PHPUnit\Framework\TestCase;
use VasilDakov\Econt\Model\City;
use VasilDakov\Econt\Serializer\SerializerFactory;

class CityTest extends TestCase
{
    /**
     * @test
     */
    public function itCanBeCreated(): void
    {
        $city = new City();

        self::assertInstanceOf(City::class, $city);
    }

    /**
     * @test
     */
    public function itCanBeDeserialized(): void
    {
        $json = file_get_contents('./data/City.json');
        $serializer = (new SerializerFactory())();
        $city = $serializer->deserialize($json, City::class, 'json');

        self::assertInstanceOf(City::class, $city);
    }
}