<?php

namespace Liuggio\Filler\Test\Fixtures;

use Liuggio\Filler\PropertyTrait;

class DTOPrivateUsingTrait
{
    use PropertyTrait;

    public $one;
    private $two;
    private $three;

    function __construct($one, $two, $three)
    {
        $this->one = $one;
        $this->two = $two;
        $this->three = $three;
    }
}
