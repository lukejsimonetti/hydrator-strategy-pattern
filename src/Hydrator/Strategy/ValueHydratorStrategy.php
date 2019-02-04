<?php
namespace src\Hydrator\Strategy;

use src\Entity\EntityInterface;
use src\Entity\Value;
use src\Hydrator\ClassMethodsHydrator;

class ValueHydratorStrategy implements HydratorStrategy
{
    /**
     * @param array $value
     * @return EntityInterface
     */
    public function hydrate(array $value) : EntityInterface
    {
        $value = (new ClassMethodsHydrator())->hydrate($value, new Value());
        return $value;
    }

    public function extract($value)
    {

    }
}