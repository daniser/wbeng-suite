<?php

declare(strict_types=1);

namespace TTBooking\WBEngine\DTO;

use TTBooking\Stateful\Attributes\Endpoint;
use TTBooking\Stateful\Attributes\Method;
use TTBooking\Stateful\Concerns\Attributes;
use TTBooking\Stateful\Contracts\QueryPayload;
use TTBooking\WBEngine\Builders\SelectFlight as SelectFlightBuilder;
use TTBooking\WBEngine\DTO\Query\CorporateID;
use TTBooking\WBEngine\DTO\Query\FlightGroup;
use TTBooking\WBEngine\Serializer\Attribute\SerializedPath;

/**
 * @implements QueryPayload<"select", FlightsResult>
 */
#[Method('POST'), Endpoint('price')]
class SelectFlight implements QueryPayload
{
    /** @use Attributes<"select", FlightsResult> */
    use Attributes, SelectFlightBuilder;

    public function __construct(
        public string $token,

        /** @var list<FlightGroup> */
        #[SerializedPath('[flightsGroup][flightGroup]')]
        public array $flightGroups,

        public ?CorporateID $corporateID = null,
    ) {}
}
