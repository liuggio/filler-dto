<?php

namespace Liuggio\Filler\Test\Fixtures;

class DTO
{
    public $one;
    public $two;

    public function __construct($one, $two)
    {
        $this->one = $one;
        $this->two = $two;
    }
}
