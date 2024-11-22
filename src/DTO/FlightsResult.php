<?php

declare(strict_types=1);

namespace TTBooking\WBEngine\DTO;

use TTBooking\WBEngine\DTO\Result\Context;
use TTBooking\WBEngine\DTO\Result\FlightGroup;
use TTBooking\WBEngine\DTO\Result\Message;
use TTBooking\WBEngine\Serializer\Attribute\SerializedPath;

class FlightsResult
{
    public string $token;

    /** @var list<Message> */
    #[SerializedPath('[messages][message]')]
    public array $messages = [];

    public Context $context;

    /** @var list<FlightGroup> */
    #[SerializedPath('[flightsGroup][flightGroup]')]
    public array $flightGroups;

    /** @deprecated */
    public ?string $initTime;
}
