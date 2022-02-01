<?php

declare(strict_types=1);

namespace Authanram\Attributes\Tests\TestFiles;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class TestAttribute
{
    private object $context;

    private string $name;

    private array $argsConstructor;

    private array $argsHandle;

    public function __construct(...$args)
    {
        $this->argsConstructor = $args;
    }

    public function handle(object $context, string $name, ...$args): void
    {
        $context->isTrue = false;

        $this->context = $context;

        $this->name = $name;

        $this->argsHandle = $args;
    }

    public function value($old): array
    {
        return [
            'args_constructor' => $this->argsConstructor,
            'args_handle' => $this->argsHandle,
            'context' => $this->context,
            'name' => $this->name,
            'old' => $old,
        ];
    }
}
