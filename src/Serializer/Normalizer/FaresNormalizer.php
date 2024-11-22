<?php

declare(strict_types=1);

namespace TTBooking\WBEngine\Serializer\Normalizer;

use Symfony\Component\Serializer\Exception\LogicException;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerAwareInterface;
use Symfony\Component\Serializer\SerializerAwareTrait;
use TTBooking\WBEngine\DTO\Result\Fares;

final class FaresNormalizer implements NormalizerInterface, DenormalizerInterface, SerializerAwareInterface
{
    use SerializerAwareTrait;

    public const LEGACY = 'legacy';

    /**
     * @return array<'*'|'object'|class-string|string, null|bool>
     */
    public function getSupportedTypes(?string $format): array
    {
        return [
            Fares::class => false,
        ];
    }

    /**
     * @param array<string, mixed> $context
     *
     * @return array<string, mixed>
     */
    public function normalize(mixed $object, ?string $format = null, array $context = []): array
    {
        $context['wrapped'] = true;

        if (!$this->serializer instanceof NormalizerInterface) {
            throw new LogicException('Cannot wrap path because the injected serializer is not a normalizer.');
        }

        $data = $this->serializer->normalize($object, $format, $context);

        if (is_array($data) && isset($data['fareTotal']) && !is_array($data['fareTotal'])) {
            $data['fareTotal'] = ['total' => $data['fareTotal']];
        }

        /** @var array<string, mixed> */
        return $data;
    }

    /**
     * @param array<string, mixed> $context
     */
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return true === ($context[self::LEGACY] ?? false)
            && $data instanceof Fares
            && true !== ($context['wrapped'] ?? false);
    }

    /**
     * @param array<string, mixed> $context
     */
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        // @phpstan-ignore-next-line
        if (is_array($data) && isset($data['fareTotal']['total'])) {
            $data['fareTotal'] = $data['fareTotal']['total'];
        }

        if (!$this->serializer instanceof DenormalizerInterface) {
            throw new LogicException('Cannot unwrap path because the injected serializer is not a denormalizer.');
        }

        return $this->serializer->denormalize($data, $type, $format, $context);
    }

    /**
     * @param array<string, mixed> $context
     */
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return true === ($context[self::LEGACY] ?? false)
            && is_a($type, Fares::class, true)
            && is_array($data) && isset($data['fareTotal']['total']); // @phpstan-ignore-line
    }
}
