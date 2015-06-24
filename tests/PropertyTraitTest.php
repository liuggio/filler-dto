<?php

namespace Liuggio\Filler\Test;


use Liuggio\Filler\PropertyTrait;

class PropertyTraitTest extends \PHPUnit_Framework_TestCase
{
    use PropertyTrait;

    public function testShouldApplyAllThePublicDTOProperties()
    {
        $dto = new Fixtures\DTOPublic('1', '2', 'private');

        $cart = new Fixtures\Cart($dto);

        $this->assertEquals('1-2-', $cart->getOneAndTwoAndThree());
    }

    public function testADTOShouldExposeAllItsPrivateVariableWhenUsingTrait()
    {
        $dto = new Fixtures\DTOPrivateUsingTrait('public', 'private1', 'private2');

        $cart = new Fixtures\Cart($dto);

        $this->assertEquals('public-private1-private2', $cart->getOneAndTwoAndThree());
    }

    public function testCopyValuesBetween2Objects()
    {
        $from = new Fixtures\DTO('1', '2');
        $to = new Fixtures\DTO('3', '4');

        $this->fillProperties($from, $to);

        $this->assertEquals($from,$to);
    }
} 