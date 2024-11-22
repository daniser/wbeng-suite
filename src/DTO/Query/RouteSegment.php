<?php

declare(strict_types=1);

namespace TTBooking\WBEngine\DTO\Query;

use DateTimeInterface;
use Symfony\Component\Validator\Constraints as Assert;
use TTBooking\WBEngine\Builders;
use TTBooking\WBEngine\DTO\Common\Location;

class RouteSegment
{
    use Builders\RouteSegment;

    public function __construct(
        #[Assert\Valid]
        public Location $locationBegin,

        #[Assert\Valid]
        public Location $locationEnd,

        public DateTimeInterface $date,
    ) {}
}
