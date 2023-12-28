<?php

declare(strict_types=1);

namespace VasilDakov\Econt\Response;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as Serializer;

final readonly class GetClientProfilesResponse
{
    #[Serializer\Type("ArrayCollection<VasilDakov\Econt\Model\ProfilesResponseElement>")]
    private ArrayCollection $profiles;
}
