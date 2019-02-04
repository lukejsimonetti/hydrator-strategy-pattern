<?php
namespace src\Entity\Form;

use src\Entity\EntityInterface;
use src\Entity\Field\Choices;
use src\Entity\Label;
use src\Entity\Field\Entity as Field;
use src\Entity\Value;

class Fieldset implements EntityInterface
{
    /** @var string */
    public $id;

    /** @var string */
    public $normalized;

    /** @var string */
    public $case;

    /** @var string */
    public $repeat;

    /**
     * Label object
     * @var Label
     */
    public $label;

    /**
     * Array of Field objects
     * @var array
     */
    public $fieldset;

    /** @var Field */
    public $field;

    /** @var string */
    public $plain;

    /** @var Choices */
    public $choices;

    /** @var Value */
    public $value;

    /** @var string */
    public $type;

    /**
     * @return string
     */
    public function getId(): ?string
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
     * @return string
     */
    public function getCase(): string
    {
        return $this->case;
    }

    /**
     * @param string $case
     */
    public function setCase(string $case)
    {
        $this->case = $case;
    }

    /**
     * @return string
     */
    public function getRepeat(): string
    {
        return $this->repeat;
    }

    /**
     * @param string $repeat
     */
    public function setRepeat(string $repeat)
    {
        $this->repeat = $repeat;
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

    /**
     * @return Field
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * @param Field $field
     */
    public function setField($field)
    {
        $this->field = $field;
    }

    /**
     * @return string
     */
    public function getPlain(): string
    {
        return $this->plain;
    }

    /**
     * @param string $plain
     */
    public function setPlain(string $plain)
    {
        $this->plain = $plain;
    }

    /**
     * @return Choices
     */
    public function getChoices(): Choices
    {
        return $this->choices;
    }

    /**
     * @param Choices $choices
     */
    public function setChoices(Choices $choices)
    {
        $this->choices = $choices;
    }

    /**
     * @return Value
     */
    public function getValue(): Value
    {
        return $this->value;
    }

    /**
     * @param Value $value
     */
    public function setValue(Value $value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type)
    {
        $this->type = $type;
    }


}
