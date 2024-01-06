# Econt API Client [WIP]

[![Latest Stable Version](http://poser.pugx.org/vasildakov/econt/v)](https://packagist.org/packages/vasildakov/econt)
![build](https://github.com/vasildakov/econt/actions/workflows/php.yml/badge.svg)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/vasildakov/econt/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/vasildakov/econt/?branch=main)
[![Code Coverage](https://scrutinizer-ci.com/g/vasildakov/econt/badges/coverage.png?b=main)](https://scrutinizer-ci.com/g/vasildakov/econt/?branch=main)
[![Build Status](https://scrutinizer-ci.com/g/vasildakov/econt/badges/build.png?b=main)](https://scrutinizer-ci.com/g/vasildakov/econt/build-status/main)
[![Total Downloads](https://img.shields.io/packagist/dt/vasildakov/econt.svg)](https://packagist.org/packages/vasildakov/econt/stats)


## Features

This library is compliant with [PSR-7: HTTP message interfaces](https://www.php-fig.org/psr/psr-7/), [PSR-17: HTTP Factories](https://www.php-fig.org/psr/psr-17/) and [PSR-18: HTTP Client](https://www.php-fig.org/psr/psr-18/)


## Installation

Using Composer:

```
$ composer require vasildakov/econt
```

## Tests

Running unit tests:

```
$ ./vendor/bin/phpunit --coverage-html ./build/coverage 
```


## Configuration

The Econt API Client can be configured with any PSR-18 HTTP Client and PSR-17 HTTP Factory implementations. 
In the following example we use [Guzzle](https://github.com/guzzle/guzzle) and [Diactoros](https://github.com/laminas/laminas-diactoros) 
to configure the client:

```php 

<?php

declare(strict_types=1);

use VasilDakov\Econt\Econt;
use GuzzleHttp\Client;
use Laminas\Diactoros\RequestFactory;

/** @var Configuration $configuration */
$configuration = new Configuration('username', 'password');

/** @var \Psr\Http\Client\ClientInterface $client */
$client = new Client();

/** @var \Psr\Http\Message\RequestFactoryInterface $factory */
$factory = new RequestFactory();

$econt = new Econt($configuration, $client, $factory);
```


## Usage

The Client provides a public API for communication with the Econt API

```php
<?php

$econt = new Econt($configuration, $client, $factory);
$json = $econt->getClientProfiles(); // json
```

The returned json response can be decoded to associative array or php class:

```php
<?php

$array = json_decode($json);
var_dump($array);
```

The json response can be also deserialized to an object:

```php
<?php

use VasilDakov\Econt\Serializer\SerializerFactory;

$serializer = (new SerializerFactory())();

$json = $econt->getClientProfiles(); 
$object = $serializer->deserialize($json, GetClientProfilesResponse::class, 'json');
```

## Notes

For more information you can check the official Econt API [documentation](https://www.econt.com/developers/soap-json-api.html). 

The available API services can be found [here](https://ee.econt.com/services/).

## License

Code released under [the MIT license](https://github.com/vasildakov/postcode/blob/master/LICENSE)

http://ee.econt.com/services/
