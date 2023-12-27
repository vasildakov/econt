<?php

namespace VasilDakov\Econt\Serializer;

use JMS\Serializer;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerInterface;
use VasilDakov\Econt\Exception\ServiceNotCreatedException;

class SerializerFactory
{
    /**
     * @return SerializerInterface
     */
    public function __invoke(): SerializerInterface
    {
        try {
            return Serializer\SerializerBuilder::create()
                ->setPropertyNamingStrategy(
                    new Serializer\Naming\SerializedNameAnnotationStrategy(
                        new Serializer\Naming\IdenticalPropertyNamingStrategy()
                    )
                )
                ->setSerializationContextFactory(function () {
                    return SerializationContext::create()
                        ->setSerializeNull(true);
                })
                ->build()
                ;
            // @codeCoverageIgnoreStart
        } catch (\Throwable $e) {
            throw new ServiceNotCreatedException();
        }
        // @codeCoverageIgnoreEnd
    }
}
