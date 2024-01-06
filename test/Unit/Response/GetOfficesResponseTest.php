<?php

namespace VasilDakov\EcontTest\Unit\Response;

use JMS\Serializer\SerializerInterface;
use PHPUnit\Framework\TestCase;
use VasilDakov\Econt\Response\GetOfficesResponse;
use VasilDakov\Econt\Serializer\SerializerFactory;

class GetOfficesResponseTest extends TestCase
{
    protected SerializerInterface $serializer;

    protected function setUp(): void
    {
        parent::setUp();

        $this->serializer = (new SerializerFactory())();
    }

    public function testItCanBeCreated(): void
    {
        $response = new GetOfficesResponse();

        self::assertInstanceOf(GetOfficesResponse::class, $response);
    }
}