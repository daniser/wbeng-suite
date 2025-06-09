<?php

declare(strict_types=1);

namespace TTBooking\WBEngine\Serializer;

use Illuminate\Support\Arr;
use Symfony\Component\Serializer\SerializerInterface as SymfonySerializerInterface;
use TTBooking\Stateful\Contracts\Serializer;

class SerializerWrapper implements Serializer
{
    public function __construct(protected SymfonySerializerInterface $serializer) {}

    public function serialize(mixed $data, array $context = []): string
    {
        // @phpstan-ignore-next-line
        return $this->serializer->serialize($data, 'json', Arr::only($context, 'legacy'));
    }

    public function deserialize(string $data, string $type, array $context = []): object
    {
        // @phpstan-ignore-next-line
        return $this->serializer->deserialize($data, $type, 'json', Arr::only($context, 'legacy'));
    }
}
