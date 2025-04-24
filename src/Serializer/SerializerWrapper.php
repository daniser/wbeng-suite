<?php

declare(strict_types=1);

namespace TTBooking\WBEngine\Serializer;

use Symfony\Component\Serializer\SerializerInterface as SymfonySerializerInterface;
use TTBooking\Stateful\Contracts\Serializer;

class SerializerWrapper implements Serializer
{
    public function __construct(protected SymfonySerializerInterface $serializer) {}

    public function serialize(mixed $data, array $context = []): string
    {
        return $this->serializer->serialize($data, 'json', $context);
    }

    public function deserialize(string $data, string $type, array $context = []): object
    {
        return $this->serializer->deserialize($data, $type, 'json', $context);
    }
}
