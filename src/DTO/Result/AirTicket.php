<?php

declare(strict_types=1);

namespace TTBooking\WBEngine\DTO\Result;

use DateTimeInterface;
use TTBooking\WBEngine\DTO\Common\Carrier;
use TTBooking\WBEngine\DTO\Common\Passenger;
use TTBooking\WBEngine\DTO\Enums\TicketStatus;

class AirTicket
{
    public function __construct(
        public string $token,

        public Carrier $carrier,

        public int $eticket,

        public DateTimeInterface $issueDate,

        public string $recordLocator,

        public string $regLocator,

        public TicketStatus $status,

        public string $number,

        public string $exchangeNumber,

        public Passenger $passenger,

        /** @var list<Itinerary> */
        public array $itineraries,

        public Fares $fares,

        public bool $isExtraTicket,

        public bool $isLowcost,

        public bool $isCharter,

        public bool $isSpecial,
    ) {}
}
