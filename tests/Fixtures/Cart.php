<?php

namespace Liuggio\Filler\Test\Fixtures;

use Liuggio\Filler\PropertyTrait;

class Cart
{
    use PropertyTrait;

    private $one;
    private $two;
    private $three;

    public function __construct($dto)
    {
        $this->fillProperties($dto);
    }

    /**
     * @return mixed
     */
    public function getOneAndTwoAndThree()
    {
        return $this->one.'-'.$this->two.'-'.$this->three;
    }
}
