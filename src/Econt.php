<?php

declare(strict_types=1);

namespace VasilDakov\Econt;

use Fig\Http\Message\RequestMethodInterface;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use VasilDakov\Econt\Request;

/**
 * Class Econt
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
final class Econt implements EcontInterface
{
    public const API_URL = 'https://demo.econt.com';

    public function __construct(
        private readonly Configuration $configuration,
        private readonly ClientInterface $client,
        private readonly RequestFactoryInterface $factory
    ) {
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getClientProfiles(): string
    {
        $request = $this->createRequest(
            RequestMethodInterface::METHOD_POST,
            self::API_URL . '/ee/services/Profile/ProfileService.getClientProfiles.json',
            []
        );

        $response = $this->client->sendRequest($request);

        return $response->getBody()->getContents();
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getCountries(): string
    {
        $request = $this->createRequest(
            RequestMethodInterface::METHOD_POST,
            self::API_URL . '/ee/services/Nomenclatures/NomenclaturesService.getCountries.json',
            []
        );

        $response = $this->client->sendRequest($request);

        return $response->getBody()->getContents();
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getCities(Request\GetCitiesRequest $object): string
    {
        $request = $this->createRequest(
            RequestMethodInterface::METHOD_POST,
            self::API_URL . '/ee/services/Nomenclatures/NomenclaturesService.getCities.json',
            $object->toArray()
        );

        $response = $this->client->sendRequest($request);

        return $response->getBody()->getContents();
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function getOffices(Request\GetOfficesRequest $object): string
    {
        $request = $this->createRequest(
            RequestMethodInterface::METHOD_POST,
            self::API_URL . '/ee/services/Nomenclatures/NomenclaturesService.getOffices.json',
            $object->toArray()
        );

        $response = $this->client->sendRequest($request);

        return $response->getBody()->getContents();
    }


    public function getStreets(Request\GetStreetsRequest $object): string
    {
        $request = $this->createRequest(
            RequestMethodInterface::METHOD_POST,
            self::API_URL . '/ee/services/Nomenclatures/NomenclaturesService.getStreets.json',
            $object->toArray()
        );

        $response = $this->client->sendRequest($request);

        return $response->getBody()->getContents();
    }


    public function getQuarters(array $data): string
    {
        return '';
    }



    public function getShipmentStatuses(array $data): string
    {
        $request = $this->createRequest(
            RequestMethodInterface::METHOD_POST,
            self::API_URL . '/ee/services/Shipments/ShipmentService.getShipmentStatuses.json',
            $data
        );

        $response = $this->client->sendRequest($request);

        return $response->getBody()->getContents();
    }


    /**
     * @param string $method
     * @param string $uri
     * @param array $data
     * @return RequestInterface
     */
    private function createRequest(string $method, string $uri, array $data): RequestInterface
    {
        $request = $this->factory->createRequest($method, $uri);

        $request = $request->withAddedHeader('Content-Type', 'application/json');
        $request = $request->withAddedHeader(
            'Authorization',
            'Basic ' . base64_encode(
                $this->configuration->username . ":" . $this->configuration->password
            )
        );

        $request->getBody()->write(json_encode($data));

        return $request;
    }



    public function createLabel(array $data): string
    {
        return '';
    }

    public function createLabels(array $data): string
    {
        return '';
    }

    public function deleteLabels(array $data): string
    {
        return '';
    }
}
