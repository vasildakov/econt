<?php

namespace VasilDakov\Econt\Response;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as Serializer;

class GetQuartersResponse
{
    #[Serializer\Type("ArrayCollection<VasilDakov\Econt\Model\Quarter>")]
    private ArrayCollection $quarters;

    public function __construct()
    {
        $this->quarters = new ArrayCollection();
    }
}
