<?php
namespace src\Entity\Field;

use src\Entity\EntityInterface;

class Choices implements EntityInterface
{
    /** @var Choice */
    public $choice;

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

}