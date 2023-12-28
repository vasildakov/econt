<?php

declare(strict_types=1);

namespace VasilDakov\Econt\Model;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as Serializer;


final class ProfilesResponseElement
{
    public function __construct(
        #[Serializer\Type(ClientProfile::class)]
        public ?ClientProfile $client,

        #[Serializer\Type('ArrayCollection<VasilDakov\Econt\Model\Address>')]
        public ArrayCollection $addresses,

        #[Serializer\Type(CDPayOptions::class)]
        public ?CDPayOptions $cdPayOptions,

        #[Serializer\Type(Instruction::class)]
        public ?Instruction $instructionTemplates,
    ) {
        $this->addresses = new ArrayCollection();
    }
}