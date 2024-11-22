<?php

declare(strict_types=1);

namespace TTBooking\WBEngine\DTO\Common;

use DateTimeInterface;
use TTBooking\WBEngine\DTO\Enums\DocumentType;
use TTBooking\WBEngine\DTO\Enums\Gender;

class Passport
{
    public function __construct(
        public string $firstName,

        public string $lastName,

        public ?string $middleName,

        public Country $citizenship,

        public Country $issueCountry,

        public DateTimeInterface $issued,

        public DateTimeInterface $expired,

        public string $number,

        public DocumentType $type,

        public DateTimeInterface $birthday,

        public Gender $gender,
    ) {}
}
