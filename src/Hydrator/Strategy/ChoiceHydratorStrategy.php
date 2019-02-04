<?php
namespace src\Hydrator\Strategy;

use src\Entity\EntityInterface;
use src\Entity\Field\Choice;
use src\Hydrator\ClassMethodsHydrator;

class ChoiceHydratorStrategy implements HydratorStrategy
{
    /**
     * @param array $value
     * @return EntityInterface
     */
    public function hydrate(array $value): EntityInterface
    {
        $value = (new ClassMethodsHydrator())->hydrate($value, new Choice());
        return $value;
    }

    public function extract($value)
    {

    }
}