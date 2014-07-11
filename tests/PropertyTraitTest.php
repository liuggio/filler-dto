<?php

namespace Liuggio\Filler\Test;


class PropertyTraitTest extends \PHPUnit_Framework_TestCase
{
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
} 