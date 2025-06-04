<?php

declare(strict_types=1);

namespace TTBooking\WBEngine\DTO;

use Symfony\Component\Validator\Constraints as Assert;
use TTBooking\Stateful\Attributes\Endpoint;
use TTBooking\Stateful\Attributes\Method;
use TTBooking\Stateful\Concerns\Attributes;
use TTBooking\Stateful\Contracts\QueryPayload;
use TTBooking\WBEngine\Builders\CreateBooking as CreateBookingBuilder;
use TTBooking\WBEngine\DTO\Query\FlightGroup;
use TTBooking\WBEngine\Serializer\Attribute\SerializedPath;

/**
 * @implements QueryPayload<"book", BookingResult>
 */
#[Method('POST'), Endpoint('book')]
class CreateBooking implements QueryPayload
{
    /** @use Attributes<"book", BookingResult> */
    use Attributes, CreateBookingBuilder;

    public function __construct(
        public string $token,

        /** @var list<FlightGroup> */
        #[SerializedPath('[flightsGroup][flightGroup]')]
        public array $flightGroups,

        #[Assert\Valid]
        public Common\Customer $customer,

        /** @var list<Common\Passenger> */
        #[Assert\Valid]
        #[SerializedPath('[passengers][passenger]')]
        public array $passengers,

        public Common\TourCode $tourCode,

        public Common\BenefitCode $benefitCode,

        public Common\Code3D $code3D,

        public ?bool $isHealthChecked = null,
    ) {}
}
