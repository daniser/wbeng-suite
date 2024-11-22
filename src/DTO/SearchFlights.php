<?php

declare(strict_types=1);

namespace TTBooking\WBEngine\DTO;

use Symfony\Component\Validator\Constraints as Assert;
use TTBooking\UniQuery\Attributes\Endpoint;
use TTBooking\UniQuery\Attributes\Method;
use TTBooking\UniQuery\Attributes\ResultType;
use TTBooking\WBEngine\Builders\SearchFlights as SearchFlightsBuilder;
use TTBooking\WBEngine\DTO\Common\Carrier;
use TTBooking\WBEngine\DTO\Common\Code3D;
use TTBooking\WBEngine\DTO\Enums\FlightSorting;
use TTBooking\WBEngine\DTO\Enums\ServiceClass;
use TTBooking\WBEngine\DTO\Query\RouteSegment;
use TTBooking\WBEngine\DTO\Query\Seat;

#[Method('POST'), Endpoint('flights'), ResultType(FlightsResult::class)]
class SearchFlights
{
    use SearchFlightsBuilder;

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