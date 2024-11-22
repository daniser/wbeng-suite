<?php

declare(strict_types=1);

namespace TTBooking\WBEngine\DTO\Query;

use TTBooking\WBEngine\Serializer\Attribute\SerializedPath;

class FlightGroup
{
    public function __construct(
        public string $token,

        /** @var list<Itinerary> */
        #[SerializedPath('[itineraries][itinerary]')]
        public array $itineraries,
    ) {}
}
