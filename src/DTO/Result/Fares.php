<?php

declare(strict_types=1);

namespace TTBooking\WBEngine\DTO\Result;

use TTBooking\WBEngine\Serializer\Attribute\SerializedPath;

class Fares
{
    public function __construct(
        public FareDesc $fareDesc,

        /** @var list<FareSeat> */
        #[SerializedPath('[fareSeats][fareSeat]')]
        public array $fareSeats,

        #[SerializedPath('[fareTotal][total]')]
        public int $fareTotal,

        public FareTotalOriginal $fareTotalOriginal,
    ) {}
}
