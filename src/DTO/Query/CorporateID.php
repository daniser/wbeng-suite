<?php

declare(strict_types=1);

namespace TTBooking\WBEngine\DTO\Query;

class CorporateID
{
    public function __construct(
        public string $accountCode,

        public string $tourCode,

        public string $companyName,
    ) {}
}
