<?php /** @noinspection PhpUnhandledExceptionInspection */

declare(strict_types=1);

use Authanram\Attributes\Tests\TestFiles;

it('handles attributes', function (): void {
    $result = new TestFiles\TestClass();

    expect($result->foo)->toEqual(['is_foo']);

    $result->callAttributes();

    expect($result->foo['args_constructor'])->toEqual(['quux', 'foox']);

    expect($result->foo['args_handle'])->toEqual(['qux' => 'bar']);

    expect($result->foo['context'])->toBeInstanceOf(TestFiles\TestClass::class);

    expect($result->foo['name'])->toEqual('foo');

    expect($result->foo['old'])->toEqual(['is_foo']);

    expect($result->isTrue)->toBeFalse();
});
