<?php

declare(strict_types=1);

namespace TTBooking\WBEngine\DTO\Result;

class ServiceName
{
    public function __construct(
        public string $original,

        public string $transcript,
    ) {}
}
