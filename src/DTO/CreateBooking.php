<?php

declare(strict_types=1);

namespace TTBooking\WBEngine\DTO;

use Symfony\Component\Validator\Constraints as Assert;
use TTBooking\Stateful\Attributes\Alias;
use TTBooking\Stateful\Attributes\Endpoint;
use TTBooking\Stateful\Attributes\Method;
use TTBooking\Stateful\Attributes\ResultType;
use TTBooking\WBEngine\Builders\CreateBooking as CreateBookingBuilder;
use TTBooking\WBEngine\DTO\Query\FlightGroup;
use TTBooking\WBEngine\Serializer\Attribute\SerializedPath;

#[Alias('book'), Method('POST'), Endpoint('book'), ResultType(BookingResult::class)]
class CreateBooking
{
    use CreateBookingBuilder;

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
