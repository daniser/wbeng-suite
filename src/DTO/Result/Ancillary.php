<?php

declare(strict_types=1);

namespace TTBooking\WBEngine\DTO\Result;

use DateTimeInterface;

class Ancillary
{
    public function __construct(
        public string $token,

        public string $serviceCode,

        public string $serviceGroup,

        public ServiceName $serviceName,

        public DateTimeInterface $confirmationDate,

        public int $total,
    ) {}
}
