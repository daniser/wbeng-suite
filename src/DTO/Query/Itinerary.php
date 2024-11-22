<?php

declare(strict_types=1);

namespace TTBooking\WBEngine\DTO\Query;

use TTBooking\WBEngine\Serializer\Attribute\SerializedPath;

class Itinerary
{
    public function __construct(
        public string $token,

        /** @var list<Flight> */
        #[SerializedPath('[flights][flight]')]
        public array $flights,
    ) {}
}
