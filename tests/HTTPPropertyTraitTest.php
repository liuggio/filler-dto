<?php

namespace Liuggio\Filler\Test;

use Liuggio\Filler\HTTPPropertyTrait;
use Symfony\Component\HttpFoundation\Request;

class DTO
{
    use HTTPPropertyTrait;

    private $developer;
    private $lamer;

    public function __construct(Request $request)
    {
        $this->fillPropertiesFromRequest($request);
    }

    /**
     * @return mixed
     */
    public function getLamer()
    {
        return $this->lamer;
    }

    /**
     * @return mixed
     */
    public function getDeveloper()
    {
        return $this->developer;
    }
}

class HTTPPropertyTraitTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldFillADTOFromRequest()
    {
        $liuggio = 'liuggio';
        $request = Request::create('http://test.com/foo', 'GET', array('developer' => $liuggio));

        $dto = new DTO($request);

        $this->assertEquals($dto->getDeveloper(), $liuggio);
    }
}
