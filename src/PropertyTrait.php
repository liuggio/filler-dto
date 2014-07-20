<?php

namespace Liuggio\Filler;

trait PropertyTrait
{
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

    /**
     * Expose an array of all the proprieties of this object.
     *
     * @param array|null $filter filter the proprieties to expose, null for all.
     *
     * @return array
     */
    public function getAllProperties($filter = null)
    {
        if (null === $filter && !is_array($filter)) {
            return get_object_vars($this);
        }

        return array_intersect_key($filter, get_object_vars($this));

    }

    private function _getProperties($dto)
    {
        if (is_array($dto)) {
            return $dto;
        }

        if (in_array('Liuggio\Filler\PropertyTrait', class_uses($dto))) {
            return $dto->getAllProperties();
        }

        return get_object_vars($dto);
    }
}
