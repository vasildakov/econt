<?php

namespace VasilDakov\EcontTest\Unit\Response;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\SerializerInterface;
use PHPUnit\Framework\TestCase;
use VasilDakov\Econt\Model\ProfilesResponseElement;
use VasilDakov\Econt\Response\GetClientProfilesResponse;
use VasilDakov\Econt\Serializer\SerializerFactory;

class GetClientProfilesResponseTest extends TestCase
{
    protected SerializerInterface $serializer;

    protected function setUp(): void
    {
        parent::setUp();

        $this->serializer = (new SerializerFactory())();
    }

    public function testItCanBeCreated(): void
    {
        $response = new GetClientProfilesResponse();

        self::assertInstanceOf(GetClientProfilesResponse::class, $response);
    }

    public function testItCanBeDeserialized(): void
    {
        $json = $this->getJson();
        $response = $this->serializer->deserialize($json, GetClientProfilesResponse::class, 'json');
        $profiles = $response->getProfiles();

        self::assertInstanceOf(GetClientProfilesResponse::class, $response);
        self::assertInstanceOf(ArrayCollection::class, $profiles);
        self::assertInstanceOf(ProfilesResponseElement::class, $profiles->first());
        self::assertCount(2, $profiles);
    }

    private function getJson(): string
    {
        return file_get_contents('./data/GetClientProfilesResponse.json');
    }
}
