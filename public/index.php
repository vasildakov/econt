<?php

declare(strict_types=1);

use GuzzleHttp\Client;
use Laminas\Diactoros\RequestFactory;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use VasilDakov\Econt\Configuration;
use VasilDakov\Econt\Econt;
use VasilDakov\Econt\Request\GetCitiesRequest;
use VasilDakov\Econt\Request\GetOfficesRequest;
use VasilDakov\Econt\Request\GetQuartersRequest;
use VasilDakov\Econt\Request\GetStreetsRequest;
use VasilDakov\Econt\Response\GetCitiesResponseFactory;
use VasilDakov\Econt\Response\GetClientProfilesResponse;
use VasilDakov\Econt\Response\GetOfficesResponseFactory;
use VasilDakov\Econt\Response\GetQuartersResponse;
use VasilDakov\Econt\Response\GetStreetsResponse;
use VasilDakov\Econt\Serializer\SerializerFactory;

chdir(dirname(__DIR__));

// Decline static file requests back to the PHP built-in webserver
if (php_sapi_name() === 'cli-server') {
    $path = realpath(__DIR__ . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    if (is_string($path) && __FILE__ !== $path && is_file($path)) {
        return false;
    }
    unset($path);
}

// Composer autoloading
include __DIR__ . '/../vendor/autoload.php';


$configuration = new Configuration('iasp-dev','1Asp-dev');

/** @var ClientInterface $client */
$client = new Client();

/** @var RequestFactoryInterface $factory */
$factory = new RequestFactory();

$econt = new Econt($configuration, $client, $factory);
$json = $econt->getClientProfiles();

$serilizer = (new SerializerFactory())();
//$object = $serilizer->deserialize($json, GetClientProfilesResponse::class, 'json');
//dump($object);


/*
$json = $econt->getCities(new GetCitiesRequest(countryCode: 'BGR'));
$object = (new GetCitiesResponseFactory())($json);
dump($object->findById(41));
dump($object->findByName('София'));
*/

/* $json = $econt->getOffices(new GetOfficesRequest(countryCode: 'BGR', cityId: '39'));
$response = (new GetOfficesResponseFactory())($json);
dump($response);
*/

$json = $econt->getStreets(new GetStreetsRequest(cityId: '41'));
$object = $serilizer->deserialize($json, GetStreetsResponse::class, 'json');

//$json = $econt->getQuarters(new GetQuartersRequest(cityId: '41'));
//$object = $serilizer->deserialize($json, GetQuartersResponse::class, 'json');

dump($object->getStreets()->first());