<?php

declare(strict_types=1);

namespace TTBooking\WBEngine\DTO\Result;

use TTBooking\WBEngine\DTO\Enums\PassengerType;
use TTBooking\WBEngine\Serializer\Attribute\SerializedPath;

class FareSeat
{
    public function __construct(
        public PassengerType $passengerType,

        public int $count,

        /** @var list<Price> */
        #[SerializedPath('[prices][price]')]
        public array $prices,

        /** @var list<Vat> */
        public array $vat,

        public int $total,
    ) {}
}
