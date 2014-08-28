<?php

namespace Liuggio\Filler;


class Filler {

    public static function fill($from, $to)
    {
        $allValuesOfFrom = array('a'=>'b');
        $allVariables = array('a', 'c');


    }


    /**
     * Set all the properties of this object starting from a DTO with public proprieties
     *
     * @param mixed $dto
     */
    public function fillProperties($dto)
    {
        $arrToSet = array_intersect_key($this->_getProperties($dto), get_object_vars($this));
        foreach( $arrToSet as $strAttribute => $mixValue ) {
            $this->{$strAttribute} = $mixValue;
        }
    }
} 