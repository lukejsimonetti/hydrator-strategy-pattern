<?
namespace src\Bridge;

use src\Exception\FormAssemblyProviderException;

class FormAssemblyProvider
{
    private $token;
    private $apiEndpoint = 'https://app.formassembly.com';

    const HTTP_VERB_GET = 'GET';
    const HTTP_VERB_POST = 'POST';

    /**
     * Construct a new instance
     * @param string $token The access $this->token from the OAuth transaction
     * @param string $endpointVersion The version of the api to use, defaults to api_v1
     *
     * @throws \Exception
     */
    public function __construct($token, $endpointVersion = 'api_v1')
    {
        if (!function_exists('curl_init') || !function_exists('curl_setopt')) {
            throw FormAssemblyProviderException::curlSupportRequired();
        }

        if (empty($token)) {
            throw FormAssemblyProviderException::oauthTokenRequired();
        }

        $this->token = $token;
        $this->apiEndpoint .= '/' . $endpointVersion;
    }

    /**
     * HTTP Get request for retrieving data
     * @param string $path The path of the URL for the API request
     * @param array $args The payload for the request
     *
     * @return array|false An array of the response or false
     */
    public function get($path, $args = null)
    {
        return $this->makeRequest(self::HTTP_VERB_GET, $path, $args);
    }

    /**
     * HTTP Get request for creating data
     * @param string $path The path of the URL for the API request
     * @param array $args The payload for the request
     *
     * @return array|false An array of the response or false
     */
    public function post($path, $args)
    {
        return $this->makeRequest(self::HTTP_VERB_POST, $path, $args);
    }

    /**
     * Performs the HTTP request
     * @param string $httpMethod The HTTP method to use
     * @param string $path The path of the URL for the API request
     * @param array $args The payload of the request
     *
     * @return array|false An array of the response or false
     */
    public function makeRequest($httpMethod, $path, $args)
    {
        $baseUrl = $this->buildUrl($path);

        $httpHeader = array(
            'Accept: application/json',
            'Content-Type: application/json'
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $baseUrl);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $httpHeader);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);
        curl_setopt($ch, CURLOPT_ENCODING, '');
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);

        switch ($httpMethod) {
            case self::HTTP_VERB_GET:
                $query = $this->httpBuildQuery($args);
                $fullApiUrl = $baseUrl . $query;
                curl_setopt($ch, CURLOPT_URL, $fullApiUrl);
                break;

            case self::HTTP_VERB_POST:
                curl_setopt($ch, CURLOPT_POST, true);
                $this->attachPayloadToRequest($ch, $args);
                break;

        }
        $response = curl_exec($ch);

        $this->checkErrorStatus($ch);
        unset($ch);

        return $this->getFormattedResponse($response);
    }

    /**
     * Checks the error status of the cURL request
     * @param $ch
     * @return bool
     * @throws FormAssemblyProviderException
     */
    public function checkErrorStatus($ch)
    {
        $headers = curl_getinfo($ch);
        $httpStatus = $headers['http_code'];

        if (curl_exec($ch) === false) {
            throw FormAssemblyProviderException::genericCurlError(curl_error($ch));
        }
        if ($httpStatus < 200 || $httpStatus > 299) {
            throw FormAssemblyProviderException::httpStatusException($httpStatus);
        }

        return true;
    }

    /**
     * @param array $args An array of data/args
     *
     * @return array Merged $accessTokenArr value into the args array
     */
    public function getArgsWithAccessToken($args)
    {
        $accessTokenArr = ['access_token' => $this->token];
        if (!is_array($args) || empty($args)) return $accessTokenArr;

        return array_reverse(array_merge($args, $accessTokenArr));
    }

    /**
     * Build HTTP url query from data to make a request
     * @param array $args The payload array
     *
     * @return string
     */
    public function httpBuildQuery($args)
    {
        $argsWithAccessToken = $this->getArgsWithAccessToken($args);
        $query = http_build_query($argsWithAccessToken, '', '&');
        return '?' . $query;
    }

    /**
     * @param resource $ch cURL session
     * @param array $arg Associative array of data to attach
     *
     * @return void
     */
    public function attachPayloadToRequest($ch, $args): void
    {
        $payload = json_encode($this->getArgsWithAccessToken($args));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    }

    /**
     * Returns an array of an HTTP response
     * @param array $reponse The response from a cURL request
     *
     * @return array|false The json decoded into an array
     */
    public function getFormattedResponse($response)
    {
        if (!empty($response)) {
            $decodedResponse = json_decode($response, true);
            return $decodedResponse['responses'];
        }

        return false;
    }

    /**
     * @param string|int $path The path of the desired API endpoint
     *
     * @return string
     */
    public function buildUrl($path)
    {
        if (!is_int($path) && !is_string($path)) return "";

        return $this->apiEndpoint . '/' . $path;
    }

    /**
     * @param string|int $path The path of the desired API endpoint
     * @throws FormAssemblyProviderException
     *
     * @return string|int;
     */
    public function checkPath($path)
    {
        if (empty($path)) throw FormAssemblyProviderException::apiPathRequired();

        return $path;
    }

}