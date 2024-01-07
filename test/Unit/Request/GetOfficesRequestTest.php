<?php

namespace VasilDakov\EcontTest\Unit\Request;

use PHPUnit\Framework\TestCase;
use VasilDakov\Econt\Request\GetOfficesRequest;

class GetOfficesRequestTest extends TestCase
{
    public function testItCanBeCreated(): void
    {
        $req = new GetOfficesRequest('BGR', 41);

        self::assertInstanceOf(GetOfficesRequest::class, $req);
    }
}
