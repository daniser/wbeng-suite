<?php

declare(strict_types=1);

namespace TTBooking\WBEngine\DTO\Common;

use Symfony\Component\Validator\Constraints as Assert;
use TTBooking\WBEngine\Builders;
use TTBooking\WBEngine\DTO\Enums\PassengerType;

class Passenger
{
    use Builders\Passenger;

    public function __construct(
        public string $token,

        public Passport $passport,

        public LoyaltyCard $loyaltyCard,

        public PassengerType $type,

        public string $phone,

        #[Assert\Email]
        public ?string $email = null,

        public bool $isEmailRefused = false,

        public bool $isEmailAbsent = true,

        /** @var list<Document> */
        public array $extraDocuments = [],
    ) {}
}
