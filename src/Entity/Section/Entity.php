<?php
namespace src\Entity\Section;

use src\Entity\EntityInterface;
use src\Entity\Label;

class Entity implements EntityInterface
{
    /** @var string */
    public $id;

    /** @var string */
    public $normalized;

    /** @var Label */
    public $label;

    /**
     * Array of Field objects
     * @var array
     */
    public $fieldset;

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

    /**
     * @return string
     */
    public function getNormalized(): string
    {
        return $this->normalized;
    }

    /**
     * @param string $normalized
     */
    public function setNormalized(string $normalized)
    {
        $this->normalized = $normalized;
    }

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
     * @return array
     */
    public function getFieldset(): array
    {
        return $this->fieldset;
    }

    /**
     * @param array $fieldset
     */
    public function setFieldset(array $fieldset)
    {
        $this->fieldset = $fieldset;
    }

}