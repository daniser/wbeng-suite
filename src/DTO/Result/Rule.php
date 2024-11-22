<?php

declare(strict_types=1);

namespace TTBooking\WBEngine\DTO\Result;

use TTBooking\WBEngine\DTO\Enums\RuleApplicability;
use TTBooking\WBEngine\DTO\Enums\RuleType;

class Rule
{
    public function __construct(
        public ?RuleType $type,

        public bool $allowed,

        public ?RuleApplicability $applicability,

        public ?string $penalty,

        /** @var list<string> */
        public array $descriptions,
    ) {}
}
