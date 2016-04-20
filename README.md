Filler
======

**It helps you to bridge DTOs and Model Entities.**

Fill or retrieve properties from and to [DTO](http://en.wikipedia.org/wiki/Data_transfer_object) objects!

`filler-dto` on packagist

[![Latest Stable Version](https://poser.pugx.org/liuggio/filler-dto/version.svg)](https://packagist.org/packages/liuggio/filler-dto) [![Latest Unstable Version](https://poser.pugx.org/liuggio/filler-dto/v/unstable.svg)](//packagist.org/packages/liuggio/filler-dto) [![Total Downloads](https://poser.pugx.org/liuggio/filler-dto/downloads.svg)](https://packagist.org/packages/liuggio/filler-dto)

## Fast

It doesn't use the \Reflection.

## Before the Cure

``` php
class Cart
{
    private $a;
    private $b;
    private $c;

    private function __construct($a, $b, $c)
    {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }

    public static function startShipping(StartShippingData $data)
    {
        return new self($data->a, $data->b, null);
    }

    public static function addProduct(AddProductData $data)
    {
        return new self(null, $data->b, $data->cs);
    }
}
```

## After the Cure

``` php
class Cart
{
    use PropertyTrait;

    private $a;
    private $b;
    private $c;

    private function __construct($dto)
    {
        $this->fillProperties($dto);
    }

    public static function startShipping(StartShippingData $data)
    {
        return new self($data);
    }

    public static function addProduct(AddProductData $data)
    {
        return new self($data);
    }
}

class StartShippingData
{
    public $a;
    public $b;
}

class AddProductData
{
    public $b;
    public $c;
}
```

## From Request

Do you want to map an object from the `Request`?

``` php
use Liuggio\Filler\ResponsePropertyTrait;

class StartShippingDTO
{
    use ResponsePropertyTrait;

    private $developer;

    public function __construct(Request $request)
    {
        $this->fillPropertiesFromRequest($request);
    }
...
}

Class Controller
{
    public function startShippingAction(Request $request)
    {
        $startShipping = new StartShippingDTO($request);

        if ($this->isValid($startShipping)) ...
    }
}
```

### Copy 2 objects

You can also use it for copy properties between 2 objects

``` php
use ResponsePropertyTrait;
$to = new DTOFromRequest();
$this->fillPropertiesFromRequest($request, $to);
// the $to object has all the var from the Request
```

## Differences?

We needed it for an edge case,
but then we have decided to release it  because
if you are used to develop with the `Command` pattern, this lib could help you to develop faster app.

More info at: [verraes:decoupling-symfony2-forms-from-entities](http://verraes.net/2013/04/decoupling-symfony2-forms-from-entities/)

## Install

`composer require liuggio/filler-dto dev-master`

## API

```
trait PropertyTrait
   fillProperties($dto)
   getAllProperties($filter = null)

trait ResponsePropertyTrait
    fillPropertiesFromRequest(Request $request, $name = '')
```

## Example

Please have a look to the tests and [tests/Fixtures](./tests) folders :)

## Compatibility

- >= 5.4
- hhvm
