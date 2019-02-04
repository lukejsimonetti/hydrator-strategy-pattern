<?php
namespace src\Entity;

class Label implements EntityInterface
{
    /** @var string */
    public $plain;

    /** @var string */
    public $textContent;

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