<?php

declare(strict_types=1);

namespace TTBooking\WBEngine\DTO\Result;

use TTBooking\WBEngine\DTO\Enums\ReferenceType;

class Reference
{
    public function __construct(
        public ReferenceType $type,

        public string $value,
    ) {}
}
