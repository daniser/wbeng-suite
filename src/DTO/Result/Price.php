<?php

declare(strict_types=1);

namespace TTBooking\WBEngine\DTO\Result;

use TTBooking\WBEngine\DTO\Enums\PriceType;

class Price
{
    public function __construct(
        public int $amount,

        public string $currency,

        public ?int $rate,

        public int $amountBase,

        public string $currencyBase,

        public PriceType $elementType,

        public string $code,
    ) {}
}
