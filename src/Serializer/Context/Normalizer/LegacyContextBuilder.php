<?php

declare(strict_types=1);

namespace TTBooking\WBEngine\Serializer\Context\Normalizer;

use Symfony\Component\Serializer\Context\ContextBuilderInterface;
use Symfony\Component\Serializer\Context\ContextBuilderTrait;
use TTBooking\WBEngine\Serializer\Normalizer\CaseInsensitiveBackedEnumDenormalizer;
use TTBooking\WBEngine\Serializer\Normalizer\EmptyBookingFileDenormalizer;
use TTBooking\WBEngine\Serializer\Normalizer\EmptyDateTimeDenormalizer;
use TTBooking\WBEngine\Serializer\Normalizer\TerminalDenormalizer;

final class LegacyContextBuilder implements ContextBuilderInterface
{
    use ContextBuilderTrait;

    public function withEmptyDateTimeToNull(bool $emptyDateTimeToNull = true): self
    {
        return $this->with(EmptyDateTimeDenormalizer::EMPTY_DATETIME_TO_NULL, $emptyDateTimeToNull);
    }

    public function withEmptyBookingFileToNull(bool $emptyBookingFileToNull = true): self
    {
        return $this->with(EmptyBookingFileDenormalizer::EMPTY_BOOKING_FILE_TO_NULL, $emptyBookingFileToNull);
    }

    public function withUppercaseBackedEnum(bool $uppercaseBackedEnum = true): self
    {
        return $this->with(CaseInsensitiveBackedEnumDenormalizer::UPPERCASE_BACKED_ENUM, $uppercaseBackedEnum);
    }

    public function withStringTerminalToArray(bool $stringTerminalToArray = true): self
    {
        return $this->with(TerminalDenormalizer::STRING_TERMINAL_TO_ARRAY, $stringTerminalToArray);
    }
}
