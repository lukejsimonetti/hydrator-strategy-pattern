<?php
namespace src\Hydrator\Strategy;

use src\Entity\EntityInterface;
use src\Entity\Form\Title;
use src\Hydrator\ClassMethodsHydrator;

class TitleHydratorStrategy implements HydratorStrategy
{
    /**
     * @param array $value
     * @return EntityInterface
     */
    public function hydrate(array $value) : EntityInterface
    {
        $value = (new ClassMethodsHydrator())->hydrate($value, new Title());
        return $value;
    }

    public function extract($value)
    {

    }
}