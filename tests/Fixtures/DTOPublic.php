<?php

namespace Liuggio\Filler\Test\Fixtures;

class DTOPublic
{
    public $one;
    public $two;
    private $three; // this will not moved because is private!

    public function __construct($one, $two, $three)
    {
        $this->one = $one;
        $this->two = $two;
        $this->three = $three; // this will not moved because is private!
    }
}
