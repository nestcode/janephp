<?php

namespace Jane\AutoMapper\Compiler;

use Jane\AutoMapper\Compiler\Accessor\WriteMutator;
use SebastianBergmann\GlobalState\RuntimeException;

class FromSourcePropertiesMappingExtractor extends PropertiesMappingExtractor
{
    public function getPropertiesMapping(string $source, string $target, array $options = []): array
    {
        $sourceProperties = $this->propertyInfoExtractor->getProperties($source, $options);

        if (!\in_array($target, ['array', \stdClass::class])) {
            throw new RuntimeException('Only array or stdClass are accepted as a target');
        }

        if (null === $sourceProperties) {
            return [];
        }

        $mapping = [];

        foreach ($sourceProperties as $property) {
            if (!$this->propertyInfoExtractor->isReadable($source, $property, $options)) {
                continue;
            }

            $sourceTypes = $this->propertyInfoExtractor->getTypes($source, $property, $options);
            $transformer = $this->transformerFactory->getTransformer($sourceTypes, $sourceTypes);

            if (null === $transformer) {
                continue;
            }

            $targetMutator = $this->getWriteMutator($target, $property);
            $sourceAccessor = $this->accessorExtractor->getReadAccessor($source, $property);
            $mapping[] = new PropertyMapping($sourceAccessor, $targetMutator, $transformer, $property);
        }

        return $mapping;
    }

    public function getWriteMutator(string $target, string $property): WriteMutator
    {
        $targetMutator = new WriteMutator(WriteMutator::TYPE_ARRAY_DIMENSION, $property, false);

        if ($target === \stdClass::class) {
            $targetMutator = new WriteMutator(WriteMutator::TYPE_PROPERTY, $property, false);
        }

        return $targetMutator;
    }
}
