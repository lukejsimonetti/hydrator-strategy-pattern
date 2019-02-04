<?php
namespace src\Hydrator\Strategy;

use src\Entity\EntityInterface;
use src\Entity\Label;
use src\Hydrator\ClassMethodsHydrator;

class LabelHydratorStrategy implements HydratorStrategy
{
    /**
     * @param array $value
     * @return EntityInterface
     */
    public function hydrate(array $value) : EntityInterface
    {
        $value = (new ClassMethodsHydrator())->hydrate($value, new Label());
        return $value;
    }

    public function extract($value)
    {

    }
}
