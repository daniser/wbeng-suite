<?php

declare(strict_types=1);

namespace TTBooking\WBEngine\DTO;

use Symfony\Component\Validator\Constraints as Assert;
use TTBooking\Stateful\Attributes\Endpoint;
use TTBooking\Stateful\Attributes\Method;
use TTBooking\Stateful\Concerns\Attributes;
use TTBooking\Stateful\Contracts\QueryPayload;
use TTBooking\WBEngine\Builders\SearchFlights as SearchFlightsBuilder;
use TTBooking\WBEngine\DTO\Common\Carrier;
use TTBooking\WBEngine\DTO\Common\Code3D;
use TTBooking\WBEngine\DTO\Enums\FlightSorting;
use TTBooking\WBEngine\DTO\Enums\ServiceClass;
use TTBooking\WBEngine\DTO\Query\RouteSegment;
use TTBooking\WBEngine\DTO\Query\Seat;

/**
 * @implements QueryPayload<"search", FlightsResult>
 */
#[Method('POST'), Endpoint('flights')]
class SearchFlights implements QueryPayload
{
    /** @use Attributes<"search", FlightsResult> */
    use Attributes, SearchFlightsBuilder;

    public function __construct(
        /** @var list<RouteSegment> */
        #[Assert\NotBlank, Assert\Valid]
        public array $route,

        /** @var list<Seat> */
        #[Assert\Count(min: 1, max: 9), Assert\Valid]
        public array $seats = [new Seat],

        public ServiceClass $serviceClass = ServiceClass::Economy,

        public ?bool $skipConnected = null,

        /** @deprecated */
        public ?bool $eticketsOnly = null,

        /** @deprecated */
        public ?bool $mixedVendors = null,

        /** @var null|list<Carrier> */
        #[Assert\Valid]
        public ?array $preferredAirlines = null,

        /** @var null|list<Carrier> */
        #[Assert\Valid]
        public ?array $ignoredAirlines = null,

        /** @var null|list<string> */
        public ?array $preferredFlights = null,

        public ?Code3D $code3D = null,

        public ?FlightSorting $sort = null,

        #[Assert\Positive]
        public ?int $limit = null,
    ) {}
}
