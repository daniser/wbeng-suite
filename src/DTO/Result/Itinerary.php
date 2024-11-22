<?php

declare(strict_types=1);

namespace TTBooking\WBEngine\DTO\Result;

use TTBooking\WBEngine\Serializer\Attribute\SerializedPath;

class Itinerary
{
    public function __construct(
        /** @var list<Flight> */
        #[SerializedPath('[flights][flight]')]
        public array $flights,
    ) {}
}
