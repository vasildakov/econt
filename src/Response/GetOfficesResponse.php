<?php

declare(strict_types=1);

namespace VasilDakov\Econt\Response;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as Serializer;
use VasilDakov\Econt\Model;

final class GetOfficesResponse
{
    #[Serializer\Type("ArrayCollection<VasilDakov\Econt\Model\Office>")]
    public ArrayCollection $offices;

    public function __construct()
    {
        $this->offices = new ArrayCollection();
    }
}
