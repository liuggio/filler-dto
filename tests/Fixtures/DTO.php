<?php

namespace Liuggio\Filler\Test\Fixtures;

class DTO
{
    public $one;
    public $two;

    function __construct($one, $two)
    {
        $this->one = $one;
        $this->two = $two;
    }
}
