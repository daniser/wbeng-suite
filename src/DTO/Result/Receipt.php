<?php

declare(strict_types=1);

namespace TTBooking\WBEngine\DTO\Result;

class Receipt
{
    public function __construct(
        public string $barcode,

        /** @var list<string> */
        public array $endorsements,

        /** @var list<string> */
        public array $fareCalculations,

        public ?string $operatorReference,
    ) {}
}
