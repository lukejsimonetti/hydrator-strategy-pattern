<?php
namespace src\Exception;


class FormAssemblyProviderException extends ProviderException
{
    const OAUTH_TOKEN_REQUIRED = 1;
    const CURL_SUPPORT_REQUIRED = 2;
    const API_PATH_REQUIRED = 3;
    const GENERIC_CURL_ERROR = 4;
    const HTTP_STATUS_EXCEPTION = 5;

    /**
     * @return FormAssemblyProviderException
     */
    public static function oauthTokenRequired()
    {
        return new self("OAuth Token is required.", self::OAUTH_TOKEN_REQUIRED);
    }

    /**
     * @return FormAssemblyProviderException
     */
    public static function curlSupportRequired()
    {
        return new self("Curl is required but could not be found.", self::CURL_SUPPORT_REQUIRED);
    }

    /**
     * @return FormAssemblyProviderException
     */
    public static function apiPathRequired()
    {
        return new self("API endpoint path is required.", self::API_PATH_REQUIRED);
    }

    /**
     * Returns new exception with a curl error as a string
     * @param $message
     * @return FormAssemblyProviderException
     */
    public static function genericCurlError($message)
    {
        return new self($message, self::GENERIC_CURL_ERROR);
    }

    /**
     * Returns new exception with the http status as a string
     * @param $message
     * @return FormAssemblyProviderException
     */
    public static function httpStatusException($message)
    {
        return new self($message, self::HTTP_STATUS_EXCEPTION);
    }
}