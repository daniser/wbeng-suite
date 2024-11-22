<?php

declare(strict_types=1);

namespace TTBooking\WBEngine\DTO\Result;

class Products
{
    public function __construct(
        /** @var list<AirTicket> */
        public array $airTicket,

        /** @var list<EmdTicket> */
        public array $emdTicket,
    ) {}
}
