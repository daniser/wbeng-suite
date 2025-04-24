<?php

declare(strict_types=1);

namespace TTBooking\WBEngine\Builders;

use TTBooking\Stateful\Concerns\Buildable;
use TTBooking\Stateful\Contracts\Query;
use TTBooking\WBEngine\DTO\FlightsResult;
use TTBooking\WBEngine\DTO\Query\Flight;
use TTBooking\WBEngine\DTO\Query\FlightGroup;
use TTBooking\WBEngine\DTO\Query\Itinerary;

use function TTBooking\Stateful\entity;

/**
 * @method static static fromSearchResult(FlightsResult $result, int $flightGroupId, int $itineraryId, int $flightId)
 * @method static static fromSearch(string $token)
 * @method static static flightGroup(string $token)
 * @method static static flight(string $token)
 *
 * @mixin Query<$this, FlightsResult>
 */
trait SelectFlight
{
    use Buildable;

    public function fromSearchResult(FlightsResult $result, int $flightGroupId, int $itineraryId, int $flightId): static
    {
        return $this
            ->fromSearch($result->token)
            ->flightGroup($result->flightGroups[$flightGroupId]->token)
            ->flight($result->flightGroups[$flightGroupId]->itineraries[$itineraryId]->flights[$flightId]->token);
    }

    public function fromSearch(string $token): static
    {
        $this->token = $token;

        return $this;
    }

    public function flightGroup(string $token): static
    {
        $this->flightGroups[0] ??= entity(FlightGroup::class);
        $this->flightGroups[0]->token = $token;

        return $this;
    }

    public function flight(string $token): static
    {
        $this->flightGroups[0] ??= entity(FlightGroup::class);
        $this->flightGroups[0]->itineraries[0] ??= entity(Itinerary::class);
        $this->flightGroups[0]->itineraries[0]->flights[0] ??= entity(Flight::class);
        $this->flightGroups[0]->itineraries[0]->flights[0]->token = $token;

        return $this;
    }
}
