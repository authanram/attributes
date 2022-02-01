# Attributes

Simple usage of attributes brought by PHP8.

## Install

```
composer require authanram/attributes
```

## Usage

__Create an attribute class for any purpose, casting, mapping, etc.__

```php
<?php

namespace AwesomeProject\Attributes;

#[Attribute(Attribute::TARGET_PROPERTY)]
AwesomeAttribute
{
    /**
     * @param mixed ...$args // ['whatever', 'data']
     */
    public funtion __construct(mixed ...$args)
    {}
    
    /**
     * @param object $context   // Instance of AwesomeProject\AwesomeClass
     * @param string $name      // 'foo' (The name of the property the attribute belongs to)
     * @param mixed ...$args    // ['your', 'args']
     * 
     * @return void
     */
    public function handle(object $context, string $name, mixed ...$args)
    {
    }
    
    /**
     * @param mixed $old // 'qux'
     * 
     * @return string
     */
    public function value(mixed $old): string
    {
        return 'bar';
    }
}
```

__Use your Attribute (somewhere)__

For e.g.

```php
<?php

namespace AwesomeProject;

use Authanram\Attributes;

AwesomeClass
{
    #[Attributes\AwesomeAttribute('whatever', 'data')]
    public string $foo = 'qux';
    
    public function __construct()
    {
        new Attributes($this, 'your', 'args');
    }
}
```

### Create an Instance

```php
$instance = new \AwesomeProject\AwesomeClass();

$instance->foo; // 'bar'
```


## Some Words

The methods `handle` and `value` will only be called if present. Means if the constructor (and
arguments) plus of one these methods will fit to your needs, the other one can be omitted.

Under the hood an instance of the attribute class will be created and the methods `handle` and
`value` will be called, if present.

The return value of the method `value` will be assigned the corresponding property. Through the
arguments `$context` and `$name`, passed to the method `handle`, you'll be able to assign a value
manually to the property the attribute belongs to, e.g. `$context->{$name} = 'qux';`

In general, this should equip you with some low level tools to utilize attributes in your code.

## Testing

```
vendor/bin/pest
```
