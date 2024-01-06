<?php

namespace VasilDakov\Econt\Response;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as Serializer;

class GetStreetsResponse
{
    #[Serializer\Type("ArrayCollection<VasilDakov\Econt\Model\Street>")]
    private ArrayCollection $streets;

    public function __construct()
    {
        $this->streets = new ArrayCollection();
    }

    public function getStreets(): ArrayCollection
    {
        return $this->streets;
    }
}
