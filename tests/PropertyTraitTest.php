<?php

namespace Liuggio\Filler\Test;


class PropertyTraitTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldApplyAllThePublicDTOProperties()
    {
        $d=cal_days_in_month(CAL_GREGORIAN,10,2005);
        echo "There was $d days in October 2005";

        phpinfo();

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