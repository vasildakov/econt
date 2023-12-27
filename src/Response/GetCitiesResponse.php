<?php

declare(strict_types=1);

namespace VasilDakov\Econt\Response;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as Serializer;
use VasilDakov\Econt\Model;

final class GetCitiesResponse
{
    #[Serializer\Type("ArrayCollection<VasilDakov\Econt\Model\City>")]
    private ArrayCollection $cities;

    public function __construct()
    {
        $this->cities = new ArrayCollection();
    }

    public function findById(int $id): ?Model\City
    {
        $collection = $this->cities->filter(function (Model\City $city) use ($id) {
            return $city->id === $id;
        });

        return (!$collection->isEmpty()) ? $collection->first() : null;
    }

    public function findByName(string $name): ?Model\City
    {
        $collection = $this->cities->filter(function (Model\City $city) use ($name) {
            return $city->name === $name;
        });

        return (!$collection->isEmpty()) ? $collection->first() : null;
    }
}
