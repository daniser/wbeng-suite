<?php

declare(strict_types=1);

namespace TTBooking\WBEngine\DTO\Result;

use DateTimeInterface;
use Symfony\Component\Serializer\Attribute\Context;
use TTBooking\WBEngine\DTO\Common\Carrier;
use TTBooking\WBEngine\Serializer\Attribute\SerializedPath;
use TTBooking\WBEngine\Serializer\Normalizer\EmptyDateTimeDenormalizer;

class FlightGroup
{
    public string $token;

    /** @deprecated */
    public ?string $aggregator;

    public Carrier $carrier;

    /** @deprecated */
    public ?bool $eticket;

    public bool $latinRegistration;

    #[Context(denormalizationContext: [EmptyDateTimeDenormalizer::EMPTY_DATETIME_TO_NULL => true])]
    public ?DateTimeInterface $timeLimit;

    public string $gds;

    public ?string $terminal;

    public ?bool $allowSSC;

    public bool $allow3D;

    /** @var list<Itinerary> */
    #[SerializedPath('[itineraries][itinerary]')]
    public array $itineraries;

    public Fares $fares;

    public string $provider;

    /** @deprecated */
    public ?bool $untouchable;

    public bool $isCharter;

    public bool $isSpecial;

    public bool $isLowcost;

    public bool $isHealthCheckRequired;

    public bool $isTourOperator;

    public bool $allowBookWithAccompany;

    public bool $allowBookWithAncillary;

    public bool $virtualInterlining;

    /** @var list<OfficeReference> */
    public array $officeReference;

    public string $localPriority;
}
