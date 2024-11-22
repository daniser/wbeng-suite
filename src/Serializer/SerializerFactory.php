<?php

declare(strict_types=1);

namespace TTBooking\WBEngine\Serializer;

use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;
use Symfony\Component\Serializer\Context\Normalizer\PropertyNormalizerContextBuilder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AttributeLoader;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\BackedEnumNormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\PropertyNormalizer;
use Symfony\Component\Serializer\Serializer;
use TTBooking\UniQuery\SerializerInterface;

final class SerializerFactory
{
    public static function createSerializer(): SerializerInterface
    {
        $propertyNormalizer = new PropertyNormalizer(
            $classMetadataFactory = new ClassMetadataFactory(new AttributeLoader),
            new NameConverter\LegacyNameConverter($classMetadataFactory),
            new PropertyInfoExtractor([], [new PhpDocExtractor, new ReflectionExtractor]), null, null,
            (new PropertyNormalizerContextBuilder)
                ->withDisableTypeEnforcement(true)
                ->withSkipNullValues(true)
                ->toArray(),
        );

        return new SerializerWrapper(
            new Serializer(
                [
                    new Normalizer\CaseInsensitiveBackedEnumDenormalizer,
                    new BackedEnumNormalizer,
                    new Normalizer\TerminalDenormalizer,
                    new Normalizer\EmptyBookingFileDenormalizer,
                    new Normalizer\PersonPhoneNormalizer,
                    new Normalizer\FaresNormalizer,
                    new Normalizer\LegacyNormalizer,
                    new Normalizer\EmptyDateTimeDenormalizer,
                    new DateTimeNormalizer,
                    $propertyNormalizer,
                    new ArrayDenormalizer,
                ],
                [new JsonEncoder]
            )
        );
    }
}
