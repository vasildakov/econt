<?php

declare(strict_types=1);

namespace VasilDakov\EcontTest\Integration;

use GuzzleHttp\Client;
use Laminas\Diactoros\RequestFactory;
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
        $this->configuration = new Configuration('iasp-dev','1Asp-dev');
        //$this->client = $this->createMock(ClientInterface::class);
        //$this->factory = $this->createMock(RequestFactoryInterface::class);

        $this->client = new Client([
            'connect_timeout' => 6.18,
            'timeout' => 3.14,
            'debug' => false
        ]);
        $this->factory = new RequestFactory();

        parent::setUp();
    }

    /**
     * @test
     */
    public function itCanGetClientProfiles(): void
    {
        $econt = $this->getEcontClient();

        $array = json_decode($econt->getClientProfiles(), true);
        self::assertArrayHasKey(key: 'profiles', array: $array);
        self::assertArrayHasKey(key: 'client', array: $array['profiles'][0]);
    }

    /**
     * @test
     */
    public function itCanGetCountries(): void
    {
        $econt = $this->getEcontClient();
        $array = json_decode($econt->getCountries(), true);
        self::assertArrayHasKey(key:'countries', array: $array);
    }

    private function getEcontClient(): Econt
    {
        return new Econt(
            configuration: $this->configuration,
            client: $this->client,
            factory: $this->factory
        );
    }

    protected function tearDown(): void
    {
        sleep(2);
        parent::tearDown();
    }
}
