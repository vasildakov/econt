<?php

namespace VasilDakov\EcontTest\Unit;

use Fig\Http\Message\RequestMethodInterface;
use GuzzleHttp\Client;
use Laminas\Diactoros\RequestFactory;
use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use VasilDakov\Econt\Configuration;
use VasilDakov\Econt\Econt;
use VasilDakov\Econt\Request\GetCitiesRequest;
use function PHPUnit\Framework\once;

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
}
