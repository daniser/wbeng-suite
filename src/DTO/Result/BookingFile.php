<?php

declare(strict_types=1);

namespace TTBooking\WBEngine\DTO\Result;

use TTBooking\WBEngine\DTO\Common\BenefitCode;
use TTBooking\WBEngine\DTO\Common\Code3D;
use TTBooking\WBEngine\DTO\Common\Customer;
use TTBooking\WBEngine\DTO\Common\TourCode;
use TTBooking\WBEngine\DTO\Enums\BookingStatus;
use TTBooking\WBEngine\Serializer\Attribute\SerializedPath;

class BookingFile
{
    public function __construct(
        public string $token,

        public string $provider,

        public string $gds,

        public string $terminal,

        public string $midoffice,

        /** @var list<OfficeReference> */
        public array $officeReference,

        public string $createDate,

        public BookingStatus $status,

        public string $paymentType,

        /** @var list<Reservation> */
        #[SerializedPath('[reservations][reservation]')]
        public array $reservations,

        public Customer $customer,

        /** @var list<string> */
        public array $documents,

        /** @var list<string> */
        public array $remarks,

        /** @var list<Reference> */
        public array $accompanyingPassengers,

        public TourCode $tourCode,

        public BenefitCode $benefitCode,

        public Code3D $code3D,
    ) {}
}
