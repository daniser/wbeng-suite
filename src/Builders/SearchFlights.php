<?php

declare(strict_types=1);

namespace TTBooking\WBEngine\Builders;

use DateTimeInterface;
use TTBooking\Stateful\Concerns\Buildable;
use TTBooking\WBEngine\DTO\Common\Carrier;
use TTBooking\WBEngine\DTO\Common\Location;
use TTBooking\WBEngine\DTO\Enums\FlightSorting;
use TTBooking\WBEngine\DTO\Enums\PassengerType;
use TTBooking\WBEngine\DTO\Enums\ServiceClass;
use TTBooking\WBEngine\DTO\Query\RouteSegment;
use TTBooking\WBEngine\DTO\Query\Seat;

/**
 * @method static static from(Location|string $code, string $name = '')
 * @method static static to(Location|string $code, string $name = '')
 * @method static static on(DateTimeInterface|string $date)
 * @method static static complex(RouteSegment ...$segments)
 * @method static static for(Seat ...$seats)
 * @method static static withServiceClass(ServiceClass $serviceClass)
 * @method static static skipConnected(bool $skipConnected = true)
 * @method static static eticketsOnly(bool $eticketsOnly = true)
 * @method static static mixedVendors(bool $mixedVendors = true)
 * @method static static preferAirlines(Carrier|string ...$airlines)
 * @method static static ignoreAirlines(Carrier|string ...$airlines)
 * @method static static sort(FlightSorting $by)
 * @method static static sortByPrice()
 * @method static static sortByDuration()
 * @method static static limit(int $to)
 */
trait SearchFlights
{
    use Buildable;

    public function from(Location|string $code, string $name = ''): static
    {
        $this->route[0] ??= rollin();
        $this->route[0]->from($code, $name);

        return $this;
    }

    public function to(Location|string $code, string $name = ''): static
    {
        $this->route[0] ??= rollin();
        $this->route[0]->to($code, $name);

        return $this;
    }

    public function on(DateTimeInterface|string $date): static
    {
        $this->route[0] ??= rollin();
        $this->route[0]->on($date);

        return $this;
    }

    public function complex(RouteSegment ...$segments): static
    {
        $this->route = array_values($segments);

        return $this;
    }

    public function for(Seat ...$seats): static
    {
        $cases = array_combine(
            $cc = array_map(static fn (PassengerType $case) => $case->value, PassengerType::cases()),
            array_fill(0, count($cc), 0)
        );

        $map = array_filter(
            array_reduce($seats, static function (array $accum, Seat $seat) {
                $accum[$seat->passengerType->value] += $seat->count;

                /** @var array<string, int> */
                return $accum;
            }, $cases)
        );

        $this->seats = array_map(static function (string $type, int $count) {
            return seat(PassengerType::from($type), $count);
        }, array_keys($map), array_values($map));

        return $this;
    }

    public function withServiceClass(ServiceClass $serviceClass): static
    {
        $this->serviceClass = $serviceClass;

        return $this;
    }

    public function skipConnected(bool $skipConnected = true): static
    {
        $this->skipConnected = $skipConnected;

        return $this;
    }

    public function eticketsOnly(bool $eticketsOnly = true): static
    {
        $this->eticketsOnly = $eticketsOnly;

        return $this;
    }

    public function mixedVendors(bool $mixedVendors = true): static
    {
        $this->mixedVendors = $mixedVendors;

        return $this;
    }

    public function preferAirlines(Carrier|string ...$airlines): static
    {
        $this->preferredAirlines = array_map(static function (Carrier|string $airline) {
            return is_string($airline) ? carrier($airline) : $airline;
        }, array_values($airlines));

        return $this;
    }

    public function ignoreAirlines(Carrier|string ...$airlines): static
    {
        $this->ignoredAirlines = array_map(static function (Carrier|string $airline) {
            return is_string($airline) ? carrier($airline) : $airline;
        }, array_values($airlines));

        return $this;
    }

    public function sort(FlightSorting $by): static
    {
        $this->sort = $by;

        return $this;
    }

    public function sortByPrice(): static
    {
        return $this->sort(FlightSorting::Price);
    }

    public function sortByDuration(): static
    {
        return $this->sort(FlightSorting::Duration);
    }

    public function limit(int $to): static
    {
        $this->limit = $to;

        return $this;
    }
}
