<?php

declare(strict_types=1);

namespace VasilDakov\EcontTest;

use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use VasilDakov\Econt\Configuration;
use VasilDakov\Econt\Econt;

final class EcontTest extends TestCase
{
    private Configuration $configuration;
    private ClientInterface $client;
    private RequestFactoryInterface $factory;


    protected function setUp(): void
    {
        $this->configuration = new Configuration('username', 'password');
        $this->client = $this->createMock(ClientInterface::class);
        $this->factory = $this->createMock(RequestFactoryInterface::class);

        parent::setUp();
    }

    /**
     * @test
     */
    public function itCanBeCreatedWithValidArguments(): void
    {
        self::assertInstanceOf(
            expected: Econt::class,
            actual: new Econt(
                configuration: $this->configuration,
                client: $this->client,
                factory: $this->factory
            )
        );
    }
}
