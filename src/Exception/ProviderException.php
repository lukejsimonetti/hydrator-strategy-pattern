<?php
namespace src\Exception;


class ProviderException extends \Exception
{
    public function __construct($message, $code)
    {
        parent::__construct($message, $code);
    }

}