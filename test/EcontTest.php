<?php

declare(strict_types=1);

namespace VasilDakov\EcontTest;

use PHPUnit\Framework\TestCase;
use VasilDakov\Econt\Econt;

final class EcontTest extends TestCase
{
    /**
     * @test
     */
    public function itCanBeCreated(): void
    {
        self::assertInstanceOf(Econt::class, new Econt());
    }
}
