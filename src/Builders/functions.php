<?php

declare(strict_types=1);

namespace TTBooking\WBEngine\Builders;

use DateTimeImmutable;
use DateTimeInterface;
use TTBooking\WBEngine\DTO\Common\BenefitCode;
use TTBooking\WBEngine\DTO\Common\Carrier;
use TTBooking\WBEngine\DTO\Common\Country;
use TTBooking\WBEngine\DTO\Common\Customer;
use TTBooking\WBEngine\DTO\Common\Location;
use TTBooking\WBEngine\DTO\Common\LoyaltyCard;
use TTBooking\WBEngine\DTO\Common\Passenger;
use TTBooking\WBEngine\DTO\Common\TourCode;
use TTBooking\WBEngine\DTO\CreateBooking;
use TTBooking\WBEngine\DTO\Enums\PassengerType;
use TTBooking\WBEngine\DTO\Query\RouteSegment;
use TTBooking\WBEngine\DTO\Query\Seat;
use TTBooking\WBEngine\DTO\SearchFlights;
use TTBooking\WBEngine\DTO\SelectFlight;
use TTBooking\WBEngine\Query;

use function TTBooking\Stateful\entity;

// Query Builders

/**
 * @return Query<SearchFlights>
 */
function fly(): Query
{
    return new Query(entity(SearchFlights::class));
}

/**
 * @return Query<SelectFlight>
 */
function choose(): Query
{
    return new Query(entity(SelectFlight::class));
}

/**
 * @return Query<CreateBooking>
 */
function book(): Query
{
    return new Query(entity(CreateBooking::class));
}

// Route Segment Builders

function rollin(): RouteSegment
{
    return entity(RouteSegment::class);
}

function from(Location|string $code, string $name = ''): RouteSegment
{
    return rollin()->from($code, $name);
}

function to(Location|string $code, string $name = ''): RouteSegment
{
    return rollin()->to($code, $name);
}

function on(DateTimeInterface|string $date): RouteSegment
{
    return rollin()->on($date);
}

function segment(Location|string $from, Location|string $to, DateTimeInterface|string $on): RouteSegment
{
    return from($from)->to($to)->on($on);
}

// Passenger Builder

function passenger(): Passenger
{
    return entity(Passenger::class);
}

// Entity Factories

function location(string $code, string $name = ''): Location
{
    return new Location($code, $name);
}

function country(string $code, string $name = ''): Country
{
    return new Country($code, $name);
}

function carrier(string $code, string $name = ''): Carrier
{
    return new Carrier($code, $name);
}

function customer(string $name, string $email, string $phone): Customer
{
    return new Customer($name, $email, $phone);
}

function tour_code(string $code, Carrier|string $carrier): TourCode
{
    return new TourCode($code, is_string($carrier) ? carrier($carrier) : $carrier);
}

function benefit_code(string $code, Carrier|string $carrier): BenefitCode
{
    return new BenefitCode($code, is_string($carrier) ? carrier($carrier) : $carrier);
}

function loyalty_card(string $id, Carrier|string $carrier): LoyaltyCard
{
    return new LoyaltyCard($id, is_string($carrier) ? carrier($carrier) : $carrier);
}

function date(DateTimeInterface|string $date = 'now'): DateTimeInterface
{
    return is_string($date) ? new DateTimeImmutable($date) : $date;
}

// Seat Factories

function seat(PassengerType $passengerType, int $count = 1): Seat
{
    return new Seat($passengerType, $count);
}

function adult(int $count = 1): Seat
{
    return seat(PassengerType::Adult, $count);
}

function child(int $count = 1): Seat
{
    return seat(PassengerType::Child, $count);
}

function infant(int $count = 1): Seat
{
    return seat(PassengerType::Infant, $count);
}

function youth(int $count = 1): Seat
{
    return seat(PassengerType::Youth, $count);
}

function senior(int $count = 1): Seat
{
    return seat(PassengerType::Senior, $count);
}

function disabled(int $count = 1): Seat
{
    return seat(PassengerType::Disabled, $count);
}

function escort(int $count = 1): Seat
{
    return seat(PassengerType::Escort, $count);
}
