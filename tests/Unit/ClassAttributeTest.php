<?php /** @noinspection PhpUnhandledExceptionInspection */

declare(strict_types=1);

use Authanram\Attributes\Tests\TestFiles;

it('handles attributes', function (): void {
    $result = new TestFiles\TestClass();

    $result->callAttributes();

    expect($result->context)->toBeInstanceOf(TestFiles\TestClass::class);

    expect($result->argsConstructor)->toEqual(['foo', 'bar']);

    expect($result->argsHandle)->toEqual(['qux' => 'bar']);

    expect($result->isFalse)->toBeTrue();
});
