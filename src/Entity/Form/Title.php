<?php
namespace src\Entity\Form;

use src\Entity\EntityInterface;

class Title implements EntityInterface
{
    /** @var string */
    public $textContent;

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

}