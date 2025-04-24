<?php

declare(strict_types=1);

namespace TTBooking\WBEngine\Builders;

use TTBooking\Stateful\Concerns\Buildable;
use TTBooking\WBEngine\DTO\Common\Carrier;
use TTBooking\WBEngine\DTO\Common\Code3D;
use TTBooking\WBEngine\DTO\Common\Passenger;

/**
 * @method static static customer(string $name, string $email, string $phone)
 * @method static static passengers(Passenger ...$passengers)
 * @method static static tourCode(string $code, Carrier|string $carrier)
 * @method static static benefitCode(string $code, Carrier|string $carrier)
 * @method static static code3D(string $code)
 */
trait CreateBooking
{
    use Buildable;

    public function customer(string $name, string $email, string $phone): static
    {
        $this->customer = customer($name, $email, $phone);

        return $this;
    }

    public function passengers(Passenger ...$passengers): static
    {
        $this->passengers = array_values($passengers);

        return $this;
    }

    public function tourCode(string $code, Carrier|string $carrier): static
    {
        $this->tourCode = tour_code($code, $carrier);

        return $this;
    }

    public function benefitCode(string $code, Carrier|string $carrier): static
    {
        $this->benefitCode = benefit_code($code, $carrier);

        return $this;
    }

    public function code3D(string $code): static
    {
        $this->code3D = new Code3D($code);

        return $this;
    }
}
