<?php

declare(strict_types=1);

namespace TTBooking\WBEngine\DTO\Result;

use DateTimeInterface;
use Symfony\Component\Serializer\Attribute\Context;
use TTBooking\WBEngine\DTO\Common\Carrier;
use TTBooking\WBEngine\DTO\Common\City;
use TTBooking\WBEngine\DTO\Common\Country;
use TTBooking\WBEngine\DTO\Common\Equipment;
use TTBooking\WBEngine\DTO\Common\Location;
use TTBooking\WBEngine\DTO\Common\Terminal;
use TTBooking\WBEngine\DTO\Enums\LocomotionMethod;
use TTBooking\WBEngine\DTO\Enums\ServiceClass;
use TTBooking\WBEngine\Serializer\Normalizer\CaseInsensitiveBackedEnumDenormalizer;
use TTBooking\WBEngine\Serializer\Normalizer\TerminalDenormalizer;

class Segment
{
    public function __construct(
        public string $token,

        #[Context(denormalizationContext: [CaseInsensitiveBackedEnumDenormalizer::UPPERCASE_BACKED_ENUM => true])]
        public ServiceClass $serviceClass,

        public string $bookingClass,

        public string $fareBasis,

        public string $brandName,

        public Carrier $carrier,

        public Carrier $marketingCarrier,

        public Carrier $operatingCarrier,

        public Equipment $equipment,

        public LocomotionMethod $methLocomotion,

        public DateTimeInterface $dateBegin,

        public DateTimeInterface $dateEnd,

        public string $flightNumber,

        #[Context(denormalizationContext: [TerminalDenormalizer::STRING_TERMINAL_TO_ARRAY => true])]
        public ?Terminal $terminalBegin,

        public Location $locationBegin,

        public City $cityBegin,

        public Country $countryBegin,

        #[Context(denormalizationContext: [TerminalDenormalizer::STRING_TERMINAL_TO_ARRAY => true])]
        public ?Terminal $terminalEnd,

        public Location $locationEnd,

        public City $cityEnd,

        public Country $countryEnd,

        public bool $starting,

        public bool $connected,

        public int $travelDuration,

        public Baggage $baggage,

        public Baggage $carryOn,

        public string $regLocator,

        /** @var list<Landing> */
        public array $landings,

        public ?string $seatsLeft,

        public ?DateSplit $dateSplit,
    ) {}
}
