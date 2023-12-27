<?php

declare(strict_types=1);

namespace VasilDakov\Econt\Response;

use VasilDakov\Econt\Exception\InvalidArgumentException;
use VasilDakov\Econt\Serializer\SerializerFactory;

use function json_decode;
use function json_last_error;

final class GetOfficesResponseFactory
{
    public function __invoke(string $json): GetOfficesResponse
    {
        /** @var array $array */
        $array = json_decode($json, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new InvalidArgumentException('Invalid or malformed JSON');
        }

        $serializer = (new SerializerFactory())();

        /**  @var GetOfficesResponse $response */
        return $serializer->deserialize($json, GetOfficesResponse::class, 'json');
    }
}
