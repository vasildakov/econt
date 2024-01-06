<?php

namespace VasilDakov\EcontTest\Unit\Request;

use PHPUnit\Framework\TestCase;
use VasilDakov\Econt\Request\GetQuartersRequest;

class GetQuartersRequestTest extends TestCase
{
    public function testItCanBeCreated(): void
    {
        $req = new GetQuartersRequest('41');

        self::assertInstanceOf(GetQuartersRequest::class, $req);
    }

    public function testItCanBeConvertedToArray(): void
    {
        $req = new GetQuartersRequest('41');

        self::assertIsArray($req->toArray());
    }
}