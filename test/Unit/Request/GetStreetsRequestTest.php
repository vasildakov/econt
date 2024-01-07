<?php

namespace VasilDakov\EcontTest\Unit\Request;

use PHPUnit\Framework\TestCase;
use VasilDakov\Econt\Request\GetStreetsRequest;

class GetStreetsRequestTest extends TestCase
{
    public function testItCanBeCreated(): void
    {
        $req = new GetStreetsRequest(41);

        self::assertInstanceOf(GetStreetsRequest::class, $req);
    }
}