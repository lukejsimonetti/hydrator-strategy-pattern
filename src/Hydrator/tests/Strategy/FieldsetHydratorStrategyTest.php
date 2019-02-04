<?php

use PHPUnit\Framework\TestCase;
use src\Entity\EntityInterface;
use src\Entity\Form\Fieldset;
use src\Hydrator\Strategy\FieldsetHydratorStrategy;

class FieldsetHydratorStrategyTest extends TestCase
{
    // TODO ideally this is a fixture instead of hardcoded data
    public $testData = [
        [
            'label' =>
                [
                    'plain' => '',
                ],
            'field' =>
                [
                    0 =>
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
                    1 =>
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
                ],
            'id' => 'tfa_8',
            'normalized' => 'tfa_8',
            'case' => '',
            'repeat' => '',
        ],
        [
            'label' =>
                [
                    'plain' => '',
                ],
            'field' =>
                [
                    0 =>
                        [
                            'label' =>
                                [
                                    'textContent' => 'Email',
                                    'plain' => 'Email',
                                ],
                            'value' =>
                                [
                                    'textContent' => 'tago@example.com',
                                ],
                            'id' => 'tfa_3',
                            'normalized' => 'tfa_3',
                            'type' => 'textinput',
                            'case' => '',
                            'repeat' => '',
                        ],
                    1 =>
                        [
                            'label' =>
                                [
                                    'textContent' => 'Phone Number',
                                    'plain' => 'Phone Number',
                                ],
                            'value' =>
                                [
                                    'textContent' => '555-555-5999',
                                ],
                            'id' => 'tfa_10',
                            'normalized' => 'tfa_10',
                            'type' => 'textinput',
                            'case' => '',
                            'repeat' => '',
                        ],
                ],
            'id' => 'tfa_11',
            'normalized' => 'tfa_11',
            'case' => '',
            'repeat' => '',
        ]
    ];


    public function testHydrate()
    {
        $class = new FieldsetHydratorStrategy();
        $result = $class->hydrate($this->testData);

        $this->assertTrue(is_array($result));

        foreach ($result as $key => $value) {
            $this->assertTrue($value instanceof EntityInterface);
            //check for correct namespace
            $this->assertTrue(get_class($value) == Fieldset::class);
        }
    }
}