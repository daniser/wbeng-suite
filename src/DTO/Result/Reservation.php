<?php

declare(strict_types=1);

namespace TTBooking\WBEngine\DTO\Result;

use DateTimeInterface;

class Reservation
{
    public function __construct(
        public string $token,

        public string $recordLocator,

        public string $regLocator,

        public DateTimeInterface $date,

        public DateTimeInterface $timeLimit,

        public Products $products,

        public bool $isExtraTicket,
    ) {}
}
