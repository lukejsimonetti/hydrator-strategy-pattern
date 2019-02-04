<?php
namespace src\Hydrator\Strategy;

use src\Entity\EntityInterface;
use src\Entity\Field\Choices;
use src\Hydrator\ClassMethodsHydrator;

class ChoicesHydratorStrategy implements HydratorStrategy
{
    /**
     * @param array $value
     * @return EntityInterface
     */
    public function hydrate(array $value) : EntityInterface
    {
        $value = (new ClassMethodsHydrator())->hydrate($value, new Choices());
        return $value;
    }

    public function extract($value)
    {

    }
}