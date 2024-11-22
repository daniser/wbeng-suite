<?php

declare(strict_types=1);

namespace TTBooking\WBEngine\DTO\Result;

use DateTimeInterface;
use TTBooking\WBEngine\DTO\Common\Location;

class Landing
{
    public function __construct(
        public Location $locationCode,

        public DateTimeInterface $dateBegin,

        public DateTimeInterface $dateEnd,
    ) {}
}
