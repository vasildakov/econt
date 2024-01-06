<?php

declare(strict_types=1);

namespace VasilDakov\EcontTest\Unit\Model;

use PHPUnit\Framework\TestCase;
use VasilDakov\Econt\Model\Office;

/**
 * Class OfficeTest
 *
 * @author Valentin Valkanov <valentinvalkanof@gmail.com>
 * @copyright
 * @version
 */
final class OfficeTest extends TestCase
{
    /**
     * @test
     */
    public function itCanBeCreated(): void
    {
        self::assertInstanceOf(
            Office::class,
            new Office()
        );
    }
}
