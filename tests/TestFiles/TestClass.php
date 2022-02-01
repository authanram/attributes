<?php

declare(strict_types=1);

namespace Authanram\Attributes\Tests\TestFiles;

use Authanram\Attributes\Attributes;

class TestClass
{
    #[TestAttribute('quux', 'foox')]
    public array $foo = ['is_foo'];

    public bool $isTrue = true;

    public function callAttributes(): void
    {
        new Attributes($this, qux: 'bar');
    }
}
