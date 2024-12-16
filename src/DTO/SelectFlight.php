<?php

declare(strict_types=1);

namespace TTBooking\WBEngine\DTO;

use TTBooking\UniQuery\Attributes\Alias;
use TTBooking\UniQuery\Attributes\Endpoint;
use TTBooking\UniQuery\Attributes\Method;
use TTBooking\UniQuery\Attributes\ResultType;
use TTBooking\WBEngine\Builders\SelectFlight as SelectFlightBuilder;
use TTBooking\WBEngine\DTO\Query\CorporateID;
use TTBooking\WBEngine\DTO\Query\FlightGroup;
use TTBooking\WBEngine\Serializer\Attribute\SerializedPath;

#[Alias('select'), Method('POST'), Endpoint('price'), ResultType(FlightsResult::class)]
class SelectFlight
{
    use SelectFlightBuilder;

    public function __construct(
        public string $token,

        /** @var list<FlightGroup> */
        #[SerializedPath('[flightsGroup][flightGroup]')]
        public array $flightGroups,

        public ?CorporateID $corporateID = null,
    ) {}
}
