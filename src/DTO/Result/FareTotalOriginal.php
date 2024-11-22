<?php

declare(strict_types=1);

namespace TTBooking\WBEngine\DTO\Result;

class FareTotalOriginal
{
    public function __construct(
        public ?string $elementType,

        public int $amount,

        public string $currency,
    ) {}
}
