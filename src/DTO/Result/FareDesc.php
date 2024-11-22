<?php

declare(strict_types=1);

namespace TTBooking\WBEngine\DTO\Result;

class FareDesc
{
    public function __construct(
        public Receipt $receipt,

        /** @var list<string> */
        public array $discounts,

        /** @var list<Rule> */
        public array $rules,
    ) {}
}
