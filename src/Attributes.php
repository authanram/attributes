<?php

declare(strict_types=1);

namespace Authanram\Attributes;

use ReflectionClass;

class Attributes
{
    public function __construct(object $context, mixed ...$args)
    {
        $reflection = new ReflectionClass($context);

        $properties = $reflection->getProperties();

        foreach ($properties as $property) {
            $attributes = $property->getAttributes();

            foreach ($attributes as $attribute) {
                $instance = $attribute->newInstance();

                if (method_exists($instance, 'handle')) {
                    $instance->handle($context, $property->getName(), ...$args);
                }

                if (method_exists($instance, 'value') === false) {
                    continue;
                }

                $name = $property->getName();

                $context->{$name} = $instance->value($context->{$name});
            }
        }
    }
}
