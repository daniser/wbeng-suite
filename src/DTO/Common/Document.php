<?php

declare(strict_types=1);

namespace TTBooking\WBEngine\DTO\Common;

use DateTimeInterface;

class Document
{
    public function __construct(
        public string $number,

        public DateTimeInterface $issued,

        public DateTimeInterface $expired,

        public ?Country $residence = null,
    ) {}
}
