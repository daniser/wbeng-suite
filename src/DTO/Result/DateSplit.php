<?php

declare(strict_types=1);

namespace TTBooking\WBEngine\DTO\Result;

class DateSplit
{
    public function __construct(
        public DateAndTime $departure,

        public DateAndTime $arrival,
    ) {}
}
