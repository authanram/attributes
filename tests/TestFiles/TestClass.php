<?php

declare(strict_types=1);

namespace Authanram\Attributes\Tests\TestFiles;

use Authanram\Attributes\Attributes;

#[TestClassAttribute('foo', 'bar')]
class TestClass
{
    #[TestAttribute('quux', 'foox')]
    public array $foo = ['is_foo'];

    public bool $isTrue = true;

    public bool $isFalse = false;

    public function callAttributes(): void
    {
        new Attributes($this, qux: 'bar');
    }
}
