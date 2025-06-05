<?php

declare(strict_types=1);

namespace TTBooking\WBEngine\DTO\Common;

use Symfony\Component\Validator\Constraints as Assert;

class Customer
{
    public function __construct(
        public string $name,

        #[Assert\Email]
        public string $email,

        public string $phone,
    ) {}
}
