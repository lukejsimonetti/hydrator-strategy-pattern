<?php
namespace src\Controller;

use src\Entity\Response;

class Donation
{
    public $response;

    /**
     * Donation constructor.
     * @param Response $response
     */
    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    /**
     * Gets the donors full name
     * @return string
     */
    public function getFullName(): string
    {
        // quick hack to display the first full name from the response
        $firstname = $this->response->getFieldset()[0]->getFieldset()[0]->getField()[0]->getValue()->getTextContent();
        $lastname = $this->response->getFieldset()[0]->getFieldset()[0]->getField()[1]->getValue()->getTextContent();

        return $this->concatenate(' ', $firstname, $lastname);
    }

    public function getAmount()
    {
        // get the amount
    }

    public function getOtherAmount()
    {
        // get any "other" amount
    }

    /**
     * TODO unit test, refactor out of this class, maybe avoid extra looping
     * @param string $filler
     * @param array ...$strings
     * @return string
     */
    public function concatenate(string $filler, ...$strings): string
    {
        $string = '';
        foreach ($strings as $partial) {
            $string .= $partial . $filler;
        }

        return trim($string);
    }
}