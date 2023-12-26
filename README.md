# Econt API Client

![example workflow](https://github.com/vasildakov/econt/actions/workflows/php.yml/badge.svg)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/vasildakov/econt/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/vasildakov/econt/?branch=main)
[![Code Coverage](https://scrutinizer-ci.com/g/vasildakov/econt/badges/coverage.png?b=main)](https://scrutinizer-ci.com/g/vasildakov/econt/?branch=main)
[![Build Status](https://scrutinizer-ci.com/g/vasildakov/econt/badges/build.png?b=main)](https://scrutinizer-ci.com/g/vasildakov/econt/build-status/main)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/vasildakov/econt/badges/code-intelligence.svg?b=main)](https://scrutinizer-ci.com/code-intelligence)

## Features

This library is compliant with [PSR-7: HTTP message interfaces](https://www.php-fig.org/psr/psr-7/), [PSR-17: HTTP Factories](https://www.php-fig.org/psr/psr-17/) and [PSR-18: HTTP Client](https://www.php-fig.org/psr/psr-18/)


## Installation

Using Composer:

```
$ composer require vasildakov/econt
```

## Usage

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

var_dump($econt->getClientProfiles());
```