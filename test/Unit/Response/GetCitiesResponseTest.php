<?php

namespace VasilDakov\EcontTest\Unit\Response;

use JMS\Serializer\SerializerInterface;
use PHPUnit\Framework\TestCase;
use VasilDakov\Econt\Model\City;
use VasilDakov\Econt\Response\GetCitiesResponse;
use VasilDakov\Econt\Serializer\SerializerFactory;

class GetCitiesResponseTest extends TestCase
{
    protected SerializerInterface $serializer;

    protected function setUp(): void
    {
        parent::setUp();

        $this->serializer = (new SerializerFactory())();
    }

    public function testItCanBeCreated(): void
    {
        $response = new GetCitiesResponse();
        self::assertInstanceOf(GetCitiesResponse::class, $response);
    }

    public function testItCanBeDeserialized(): void
    {
        $json = $this->getJson();
        $response = $this->serializer->deserialize($json, GetCitiesResponse::class, 'json');

        self::assertInstanceOf(GetCitiesResponse::class, $response);
    }

    public function testItCanFindById(): void
    {
        $json = $this->getJson();
        $response = $this->serializer->deserialize($json, GetCitiesResponse::class, 'json');

        $city = $response->findById(204964);

        self::assertInstanceOf(City::class, $city);
        self::assertEquals(204964, $city->id);
        self::assertEquals('LUXEMBOURG', $city->nameEn);
    }

    public function testItCanFindByName(): void
    {
        $json = $this->getJson();
        $response = $this->serializer->deserialize($json, GetCitiesResponse::class, 'json');

        $city = $response->findByName('Leihof');

        self::assertInstanceOf(City::class, $city);
        self::assertEquals(603935, $city->id);
        self::assertEquals('Leihof', $city->nameEn);
    }

    private function getJson(): string
    {
        return file_get_contents('./test/Fixtures/GetCitiesResponse.json');
    }
}
