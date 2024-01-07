<?php

namespace VasilDakov\EcontTest\Unit\Model;

use JMS\Serializer\SerializerInterface;
use PHPUnit\Framework\TestCase;
use VasilDakov\Econt\Model\Address;
use VasilDakov\Econt\Model\City;
use VasilDakov\Econt\Model\Country;
use VasilDakov\Econt\Model\Street;
use VasilDakov\Econt\Serializer\SerializerFactory;

class StreetTest extends TestCase
{
    protected SerializerInterface $serializer;

    protected function setUp(): void
    {
        parent::setUp();

        $this->serializer = (new SerializerFactory())();
    }

    public function testItCanBeCreated(): void
    {
        $street = new Street();

        self::assertInstanceOf(Street::class, $street);
    }

    public function testItCanBeDeserialized(): void
    {
        $json = file_get_contents('./data/Street.json');

        $street = $this->serializer->deserialize($json, Street::class, 'json');

        self::assertInstanceOf(Street::class, $street);
        self::assertEquals(6161, $street->id);
        self::assertEquals(46, $street->cityId);
        self::assertEquals('ul. Dunav', $street->nameEn);
        self::assertIsArray($street->toArray());
    }
}