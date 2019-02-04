<?php
namespace src\Helper;

class ClassMethodHelper
{
    /**
     * Transforms a class property to a camel cased string with a prepended verb
     * Ex: is_new to setIsNew
     * @param $property string
     * @param $verb string
     * @return string
     */
    public static function getSafeMethodName($property, $verb)
    {
        $strippedString = str_replace("_", " ", $property);
        $upperCasedStrippedString = ucwords($strippedString);
        $noWhiteSpaceUpperCasedStrippedString = str_replace(" ", "", $upperCasedStrippedString);

        return $verb . $noWhiteSpaceUpperCasedStrippedString;
    }
}