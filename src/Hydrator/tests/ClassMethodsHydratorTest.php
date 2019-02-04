<?php

use PHPUnit\Framework\TestCase;
use src\Entity\EntityInterface;
use src\Entity\Form\Fieldset;
use src\Entity\Label;
use src\Hydrator\ClassMethodsHydrator;
use src\Hydrator\Strategy\HydratorStrategy;

class ClassMethodsHydratorTest extends TestCase
{
    // TODO ideally this is a fixture instead of hardcoded data
    public $testData = [
        [
            'label' =>
                [
                    'textContent' => 'First Name',
                    'plain' => 'First Name',
                ],
            'id' => 'tfa_1'
        ],
        [
            'label' =>
                [
                    'textContent' => 'Last Name',
                    'plain' => 'Last Name',
                ],
            'id' => 'tfa_2'
        ],
    ];

    private function anonymousMockHydratorStrategyClass()
    {
        return new class implements HydratorStrategy {};
    }

    public function testAddStrategy()
    {
        $classMethodsHydrator = new ClassMethodsHydrator();

        $classMethodsHydrator->addStrategy('mock', $this->anonymousMockHydratorStrategyClass());

        $strategies = $classMethodsHydrator->getStrategies();
        $this->assertTrue(is_array($strategies));
        $this->assertTrue(array_key_exists('mock', $strategies));
    }

    public function testAddStrategy2()
    {
        $classMethodsHydrator = new ClassMethodsHydrator();

        $classMethodsHydrator->addStrategy('mock', $this->anonymousMockHydratorStrategyClass());

        $strategies = $classMethodsHydrator->getStrategies();
        $resultStrategyObject = $strategies['mock'];

        $expectedClass = get_class($this->anonymousMockHydratorStrategyClass());
        $resultClass = get_class($resultStrategyObject);
        $this->assertTrue($expectedClass === $resultClass);
    }

    public function testGetSetterMethodName()
    {
        $classMethodsHydrator = new ClassMethodsHydrator();
        $actualResult = $classMethodsHydrator->getSetterMethodName('new_property');
        $expectedResult = 'setNewProperty';

        $this->assertEquals($expectedResult, $actualResult);
    }

    public function testHydrate()
    {
        $classMethodsHydrator = new ClassMethodsHydrator();

        $resultArray = [];
        foreach($this->testData as $key => $value){
            $resultArray[] = $classMethodsHydrator->hydrate($value, new Fieldset());
        }

        foreach($resultArray as $resultKey => $resultValue){
            $this->assertTrue(get_class($resultValue) == Fieldset::class);
            $this->assertTrue($resultValue->getId() === $this->testData[$resultKey]['id']);
            $this->assertTrue($resultValue->getLabel() instanceof Label);
            $this->assertTrue($resultValue->getLabel()->getTextContent() === $this->testData[$resultKey]['label']['textContent']);
        }
    }

    public function testHydrateException()
    {
        $this->expectException(InvalidArgumentException::class);
        $classMethodsHydrator = new ClassMethodsHydrator();
        $testData = ['bad_key' => null];
        $classMethodsHydrator->hydrate($testData, new Fieldset());
    }



}

