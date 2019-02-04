<?php
namespace src\Entity;

use src\Entity\Form\Title;
use src\Entity\Field\Entity as Field;

class Response implements EntityInterface
{
    /** @var Title */
    public $title;

    /**
     * Array of Field objects
     * @var array
     */
    public $fieldset;

    /** @var Field */
    public $field;

    /** @var string */
    public $id;

    /** @var string */
    public $status;

    /** @var string */
    public $flag;

    /** @var string */
    public $isNew;

    /**
     * @return Title
     */
    public function getTitle(): Title
    {
        return $this->title;
    }

    /**
     * @param Title $title
     */
    public function setTitle(Title $title)
    {
        $this->title = $title;
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
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status)
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getFlag(): string
    {
        return $this->flag;
    }

    /**
     * @param string $flag
     */
    public function setFlag(string $flag)
    {
        $this->flag = $flag;
    }

    /**
     * @return string
     */
    public function getIsNew(): string
    {
        return $this->isNew;
    }

    /**
     * @param string $isNew
     */
    public function setIsNew(string $isNew)
    {
        $this->isNew = $isNew;
    }

}