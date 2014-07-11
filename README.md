Filler
======

**It helps you to bridge DTOs and Model Entities.**

Set or retrieve properties from and to [DTO](http://en.wikipedia.org/wiki/Data_transfer_object) objects!

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
        $this->setPropertiesFrom($dto);
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

## Differences?

**Not a great tool uh?**

We needed it for an edge case,
but then we have decided to release it  because
if you are used to develop with the `Command` pattern, this lib could help you to develop faster app.

More info at: [verraes:decoupling-symfony2-forms-from-entities](http://verraes.net/2013/04/decoupling-symfony2-forms-from-entities/)

## Install

`composer require liuggio/filler-dto dev-master`

## API

```
trait PropertyTrait
   public function setPropertiesFrom($dto)

   getAllProperties($filter = null)
```


## Example

Please have a look to the tests and tests/Fixtures folders :)