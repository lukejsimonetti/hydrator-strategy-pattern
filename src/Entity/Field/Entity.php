<?php
namespace src\Entity\Field;

use src\Entity\EntityInterface;
use src\Entity\Label;
use src\Entity\Value;

class Entity implements EntityInterface
{
    /** @var string */
    public $id;

    /** @var string */
    public $normalized;

    /** @var Label */
    public $label;

    /** @var Value */
    public $value;

    /** @var string */
    public $type;

    /** @var string */
    public $case;

    /** @var string */
    public $repeat;

    /** @var Choices */
    public $choices;

    /** @var Choice */
    public $choice;

    /** @var string */
    public $textContent;

    /** @var string */
    public $plain;

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
     * @return Choice
     */
    public function getChoice(): Choice
    {
        return $this->choice;
    }

    /**
     * @param Choice $choice
     */
    public function setChoice(Choice $choice)
    {
        $this->choice = $choice;
    }

    /**
     * @return string
     */
    public function getTextContent(): string
    {
        return $this->textContent;
    }

    /**
     * @param string $textContent
     */
    public function setTextContent(string $textContent)
    {
        $this->textContent = $textContent;
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

}