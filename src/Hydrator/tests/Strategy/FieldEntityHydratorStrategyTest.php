<?php

use PHPUnit\Framework\TestCase;
use src\Entity\EntityInterface;
use src\Entity\Field\Entity;
use src\Hydrator\Strategy\FieldEntityHydratorStrategy;

class FieldEntityHydratorStrategyTest extends TestCase
{
    // TODO ideally this is a fixture instead of hardcoded data
    public $testData = [
        [
            'label' =>
                [
                    'textContent' => 'First Name',
                    'plain' => 'First Name',
                ],
            'value' =>
                [
                    'textContent' => 'Nobusuke',
                ],
            'id' => 'tfa_1',
            'normalized' => 'tfa_1',
            'type' => 'textinput',
            'case' => '',
            'repeat' => '',
        ],
        [
            'label' =>
                [
                    'textContent' => 'Last Name',
                    'plain' => 'Last Name',
                ],
            'value' =>
                [
                    'textContent' => 'Tagomi',
                ],
            'id' => 'tfa_2',
            'normalized' => 'tfa_2',
            'type' => 'textinput',
            'case' => '',
            'repeat' => '',
        ],
    ];

    public function testHydrate()
    {
        $class = new FieldEntityHydratorStrategy();
        $result = $class->hydrate($this->testData);

        $this->assertTrue(is_array($result));

        foreach($result as $key => $value){
            $this->assertTrue($value instanceof EntityInterface);
            //check for correct namespace
            $this->assertTrue(get_class($value) == Entity::class);
        }
    }
}