<?php

namespace VasilDakov\EcontTest\Unit\Response;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\SerializerInterface;
use PHPUnit\Framework\TestCase;
use VasilDakov\Econt\Response\GetStreetsResponse;
use VasilDakov\Econt\Serializer\SerializerFactory;

class GetStreetsResponseTest extends TestCase
{
    protected SerializerInterface $serializer;

    protected function setUp(): void
    {
        parent::setUp();

        $this->serializer = (new SerializerFactory())();
    }

    public function testItCanBeCreated(): void
    {
        $response = new GetStreetsResponse();

        self::assertInstanceOf(GetStreetsResponse::class, $response);
        self::assertInstanceOf(ArrayCollection::class, $response->getStreets());
    }
}
