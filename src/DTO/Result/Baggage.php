<?php

declare(strict_types=1);

namespace TTBooking\WBEngine\DTO\Result;

use TTBooking\WBEngine\DTO\Enums\BaggageType;

class Baggage
{
    public function __construct(
        public ?BaggageType $type,

        public ?string $allow,

        public string $value,

        /** @var list<string> */
        public array $descriptions,
    ) {}
}
