<?php

declare(strict_types=1);

namespace TTBooking\WBEngine\DTO;

use Symfony\Component\Serializer\Attribute\Context;
use TTBooking\Stateful\Contracts\ResultPayload;
use TTBooking\WBEngine\DTO\Result\BookingFile;
use TTBooking\WBEngine\DTO\Result\Context as ResultContext;
use TTBooking\WBEngine\DTO\Result\Message;
use TTBooking\WBEngine\Serializer\Attribute\SerializedPath;
use TTBooking\WBEngine\Serializer\Normalizer\EmptyBookingFileDenormalizer;

class BookingResult implements ResultPayload
{
    public function __construct(
        public ?string $token,

        /** @var list<Message> */
        #[SerializedPath('[messages][message]')]
        public array $messages,

        public ?ResultContext $context,

        #[Context(denormalizationContext: [EmptyBookingFileDenormalizer::EMPTY_BOOKING_FILE_TO_NULL => true])]
        public ?BookingFile $bookingFile,
    ) {}
}
