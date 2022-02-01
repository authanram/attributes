<?php

declare(strict_types=1);

namespace Authanram\Attributes\Tests\TestFiles;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
class TestClassAttribute
{
    public array $argsConstructor;

    public function __construct(...$args)
    {
        $this->argsConstructor = $args;
    }

    public function handle(object $context, ...$args): void
    {
        $context->isFalse = true;

        $context->argsConstructor = $this->argsConstructor;

        $context->context = $context;

        $context->argsHandle = $args;
    }
}
