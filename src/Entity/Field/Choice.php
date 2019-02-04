<?php
namespace src\Entity\Field;

use src\Entity\EntityInterface;
use src\Entity\Label;

class Choice implements EntityInterface
{
    /** @var Label */
    public $label;

    /** @var string */
    public $switch;

    /** @var string */
    public $id;

    /**
     * @return Label
     */
    public function getLabel(): Label
    {
        return $this->label;
    }

    /**
     * @param Label $label
     */
    public function setLabel(Label $label)
    {
        $this->label = $label;
    }

    /**
     * @return string
     */
    public function getSwitch(): string
    {
        return $this->switch;
    }

    /**
     * @param string $switch
     */
    public function setSwitch(string $switch)
    {
        $this->switch = $switch;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id)
    {
        $this->id = $id;
    }

}