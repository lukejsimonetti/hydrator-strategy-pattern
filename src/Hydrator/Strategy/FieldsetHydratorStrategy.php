<?php
namespace src\Hydrator\Strategy;

use src\Entity\Form\Fieldset;
use src\Hydrator\ClassMethodsHydrator;

class FieldsetHydratorStrategy implements HydratorStrategy
{
    /**
     * @param array $value
     * @return array
     */
    public function hydrate(array $value)
    {
        $arr = [];
        foreach ($value as $key => $val) {
            if (is_string($val)) continue; //@TODO need to debug why this val is sometimes string

            $arr[] = (new ClassMethodsHydrator())->hydrate($val, new Fieldset());
        }

        return $arr;
    }

    public function extract($value)
    {

    }
}