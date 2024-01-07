<?php

namespace VasilDakov\EcontTest\Unit\Model;

use JMS\Serializer\SerializerInterface;
use PHPUnit\Framework\TestCase;
use VasilDakov\Econt\Model\Address;
use VasilDakov\Econt\Model\City;
use VasilDakov\Econt\Model\Country;
use VasilDakov\Econt\Serializer\SerializerFactory;

final class AddressTest extends TestCase
{
    protected SerializerInterface $serializer;

    protected function setUp(): void
    {
        parent::setUp();

        $this->serializer = (new SerializerFactory())();
    }

    public function testItCanBeCreated(): void
    {
        $address = new Address(1);

        self::assertInstanceOf(Address::class, $address);
    }

    public function testItCanBeDeserialized(): void
    {
        $json = file_get_contents('./data/Address.json');

        $address = $this->serializer->deserialize($json, Address::class, 'json');

        self::assertInstanceOf(City::class, $address->city);
        self::assertInstanceOf(Country::class, $address->city->country);

        self::assertInstanceOf(Address::class, $address);
    }
}
