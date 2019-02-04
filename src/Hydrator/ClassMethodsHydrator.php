<?php
namespace src\Hydrator;

use src\Entity\EntityInterface;
use src\Helper\ClassMethodHelper;
use src\Hydrator\Strategy\ChoiceHydratorStrategy;
use src\Hydrator\Strategy\ChoicesHydratorStrategy;
use src\Hydrator\Strategy\FieldEntityHydratorStrategy;
use src\Hydrator\Strategy\FieldsetHydratorStrategy;
use src\Hydrator\Strategy\HydratorStrategy;
use src\Hydrator\Strategy\LabelHydratorStrategy;
use src\Hydrator\Strategy\TitleHydratorStrategy;
use src\Hydrator\Strategy\ValueHydratorStrategy;

class ClassMethodsHydrator implements HydratorInterface
{
    /** @var array */
    protected $strategies = [];

    /**
     * ClassMethodsHydrator constructor.
     */
    public function __construct()
    {
        $this->setDefaultStrategies();
    }

    /**
     * Hydrates an entity with a provided array of data
     * @param array $data
     * @param EntityInterface $entity
     * @return EntityInterface
     */
    public function hydrate(array $data, EntityInterface $entity): EntityInterface
    {
        foreach ($data as $key => $value) {
            if (!method_exists($entity, $this->getSetterMethodName($key))) {
                throw new \InvalidArgumentException(sprintf(
                    'The method %s does not exist in %s',
                    $this->getSetterMethodName($key),
                    get_class($entity)
                ));
            }
            if ($this->strategies[$key]) {
                $strategy = $this->strategies[$key];
                $value = $strategy->hydrate($value);
            }
            $entity->{$this->getSetterMethodName($key)}($value);

        }

        return $entity;
    }

    /**
     * Extracts values from an entity
     * @param $value
     */
    public function extract($value)
    {

    }

    /**
     * @param string $name
     * @param HydratorStrategy $strategy
     * @return ClassMethodsHydrator
     */
    public function addStrategy(string $name, HydratorStrategy $strategy): ClassMethodsHydrator
    {
        $this->strategies[$name] = $strategy;
        return $this;
    }

    /**
     * @return array
     */
    public function getStrategies()
    {
        return $this->strategies;
    }

    /**
     * Sets the default hydrator strategies
     */
    private function setDefaultStrategies(): void
    {
        $this->addStrategy('choice', new ChoiceHydratorStrategy());
        $this->addStrategy('choices', new ChoicesHydratorStrategy());
        $this->addStrategy('label', new LabelHydratorStrategy());
        $this->addStrategy('title', new TitleHydratorStrategy());
        $this->addStrategy('field', new FieldEntityHydratorStrategy());
        $this->addStrategy('value', new ValueHydratorStrategy());
        $this->addStrategy('fieldset', new FieldsetHydratorStrategy());
    }

    /**
     * @param $property string
     * return string
     */
    public function getSetterMethodName($property): string
    {
        return ClassMethodHelper::getSafeMethodName($property, "set");
    }

}