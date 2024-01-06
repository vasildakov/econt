<?php

namespace VasilDakov\EcontTest\Unit\Response;

use JMS\Serializer\SerializerInterface;
use PHPUnit\Framework\TestCase;
use VasilDakov\Econt\Response\GetQuartersResponse;
use VasilDakov\Econt\Serializer\SerializerFactory;

class GetQuartersResponseTest extends TestCase
{
    protected SerializerInterface $serializer;

    protected function setUp(): void
    {
        parent::setUp();

        $this->serializer = (new SerializerFactory())();
    }

    public function testItCanBeCreated(): void
    {
        $response = new GetQuartersResponse();

        self::assertInstanceOf(GetQuartersResponse::class, $response);
    }
}