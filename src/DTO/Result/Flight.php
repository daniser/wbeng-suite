<?php

declare(strict_types=1);

namespace TTBooking\WBEngine\DTO\Result;

use TTBooking\WBEngine\Serializer\Attribute\SerializedPath;

class Flight
{
    public function __construct(
        public string $token,

        /** @var list<Segment> */
        #[SerializedPath('[segments][segment]')]
        public array $segments,

        public ?int $travelDuration = null,

        public ?int $seatsAvailable = null,
    ) {}
}
