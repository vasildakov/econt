<?php

declare(strict_types=1);

namespace VasilDakov\EcontTest\Unit;

use Fig\Http\Message\RequestMethodInterface;
use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use VasilDakov\Econt\Configuration;
use VasilDakov\Econt\Econt;
use VasilDakov\Econt\Request\GetCitiesRequest;
use VasilDakov\Econt\Request\GetOfficesRequest;
use VasilDakov\Econt\Request\GetStreetsRequest;

class EcontTest extends TestCase
{
    private Configuration $configuration;
    private ClientInterface $client;
    private RequestFactoryInterface $factory;
    private RequestInterface $request;
    private ResponseInterface $response;
    private StreamInterface $stream;

    protected function setUp(): void
    {
        $this->configuration = new Configuration('iasp-dev','1Asp-dev');
        $this->client = $this->createMock(ClientInterface::class);
        $this->factory = $this->createMock(RequestFactoryInterface::class);
        $this->request = $this->createMock(RequestInterface::class);
        $this->response = $this->createMock(ResponseInterface::class);
        $this->stream = $this->createMock(StreamInterface::class);

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

    /**
     * @test
     */
    public function itCanGetCountries(): void
    {
        $json = file_get_contents('./data/GetCountriesResponse.json');

        $econt = new Econt(
            configuration: $this->configuration,
            client: $this->client,
            factory: $this->factory
        );

        $this->factory
            ->expects(self::once())
            ->method('createRequest')
            ->with(RequestMethodInterface::METHOD_POST)
            ->willReturn($this->request)
        ;

        $this->request
            ->expects(self::exactly(2))
            ->method('withAddedHeader')
            ->willReturnOnConsecutiveCalls($this->request, $this->request)
        ;

        $this->client
            ->expects(self::once())
            ->method('sendRequest')
            ->with($this->request)
            ->willReturn($this->response)
        ;

        $this->response
            ->expects(self::once())
            ->method('getBody')
            ->willReturn($this->stream)
        ;

        $this->stream
            ->expects(self::once())
            ->method('getContents')
            ->willReturn($json)
        ;

        self::assertJson($econt->getCountries());
    }


    /**
     * @test
     */
    public function itCanGetCities(): void
    {
        $json = file_get_contents('./data/GetCitiesResponse.json');

        $econt = new Econt(
            configuration: $this->configuration,
            client: $this->client,
            factory: $this->factory
        );

        $this->factory
            ->expects(self::once())
            ->method('createRequest')
            ->with(RequestMethodInterface::METHOD_POST)
            ->willReturn($this->request)
        ;

        $this->request
            ->expects(self::exactly(2))
            ->method('withAddedHeader')
            ->willReturnOnConsecutiveCalls($this->request, $this->request)
        ;

        $this->client
            ->expects(self::once())
            ->method('sendRequest')
            ->with($this->request)
            ->willReturn($this->response)
        ;

        $this->response
            ->expects(self::once())
            ->method('getBody')
            ->willReturn($this->stream)
        ;

        $this->stream
            ->expects(self::once())
            ->method('getContents')
            ->willReturn($json)
        ;

        self::assertJson($econt->getCities(new GetCitiesRequest('BGR')));
    }


    /**
     * @test
     */
    public function itCanGetOffices(): void
    {
        $json = file_get_contents('./data/GetOfficesResponse.json');

        $econt = new Econt(
            configuration: $this->configuration,
            client: $this->client,
            factory: $this->factory
        );

        $this->factory
            ->expects(self::once())
            ->method('createRequest')
            ->with(RequestMethodInterface::METHOD_POST)
            ->willReturn($this->request)
        ;

        $this->request
            ->expects(self::exactly(2))
            ->method('withAddedHeader')
            ->willReturnOnConsecutiveCalls($this->request, $this->request)
        ;

        $this->client
            ->expects(self::once())
            ->method('sendRequest')
            ->with($this->request)
            ->willReturn($this->response)
        ;

        $this->response
            ->expects(self::once())
            ->method('getBody')
            ->willReturn($this->stream)
        ;

        $this->stream
            ->expects(self::once())
            ->method('getContents')
            ->willReturn($json)
        ;

        self::assertJson($econt->getOffices(new GetOfficesRequest('BGR', '1234')));
    }


    /**
     * @test
     */
    public function itCanGetStreets(): void
    {
        $json = file_get_contents('./data/GetStreetsResponse.json');

        $econt = new Econt(
            configuration: $this->configuration,
            client: $this->client,
            factory: $this->factory
        );

        $this->factory
            ->expects(self::once())
            ->method('createRequest')
            ->with(RequestMethodInterface::METHOD_POST)
            ->willReturn($this->request)
        ;

        $this->request
            ->expects(self::exactly(2))
            ->method('withAddedHeader')
            ->willReturnOnConsecutiveCalls($this->request, $this->request)
        ;

        $this->client
            ->expects(self::once())
            ->method('sendRequest')
            ->with($this->request)
            ->willReturn($this->response)
        ;

        $this->response
            ->expects(self::once())
            ->method('getBody')
            ->willReturn($this->stream)
        ;

        $this->stream
            ->expects(self::once())
            ->method('getContents')
            ->willReturn($json)
        ;

        self::assertJson($econt->getStreets(new GetStreetsRequest('1234')));
    }

    /**
     * @test
     * @dataProvider servicesDataProvider
     */
    public function itImplementsApiServices(string $method, bool $expected): void
    {
        self::assertEquals($expected, $this->methodExists($method));

    }

    private function methodExists(string $method): bool
    {
        return method_exists(Econt::class, $method);
    }

    private function servicesDataProvider(): array
    {
        return [
            'NomenclaturesService::getCountries' => ['getCountries', true],
            'NomenclaturesService::getCities'    => ['getCities', true],
            'NomenclaturesService::getOffices'   => ['getOffices', true],
            'NomenclaturesService::getStreets'   => ['getStreets', true],
            'NomenclaturesService::getQuarters'  => ['getQuarters', true],

            // not implemented
            // 'AddressService::validateAddress'    => ['validateAddress', true],
            // 'AddressService::addressServiceTimes'=> ['addressServiceTimes', true],
            // 'AddressService::getNearestOffices'  => ['getNearestOffices', true],
        ];
    }
}
