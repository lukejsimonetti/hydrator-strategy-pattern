<?php
namespace src\Controller;

use src\Bridge\FormAssemblyProvider;
use src\Entity\Response;
use src\Exception\FormAssemblyProviderException;
use src\Hydrator\ClassMethodsHydrator;

class ReportController
{
    const HTTP_INTERNAL_SERVER_ERROR = 500;

    /** @var FormAssemblyProvider */
    public $provider;

    /** @var string */
    public $token;

    /** @var int */
    public $formID;

    /**
     * ReportController constructor.
     * @param $token string
     * @param $formID int
     */
    public function __construct($token, $formID)
    {
        $this->token = $token;
        $this->formID = $formID;
        $this->setProviderInstance();
    }

    /**
     * @return array
     */
    public function getDonorReportPDFAction()
    {
        $path = $this->getURLPath();
        try {
            $response = $this->getProviderInstance()->get($path)['response'];

            // looping and exiting here just for demo purposes
            foreach ($response as $r) {
                $res = (new ClassMethodsHydrator())->hydrate($r, new Response());
                $donation = new Donation($res);

                print_r($donation->getFullName());
                exit;
            }
            // TODO
            // aggregate top 5 donor responses
            // instantiate pdf generator
            // pass in aggregated donor data
            // get pdf
            // return pdf with content type headers

        } catch (FormAssemblyProviderException $pe) {
            throw new \HttpException($pe->getMessage(), self::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Returns the path of the url concatenated with the form ID
     * @return string
     */
    public function getURLPath()
    {
        return "responses/export/" . $this->formID . ".json";
    }

    /**
     * Sets the FormAssemblyProvider instance
     */
    public function setProviderInstance()
    {
        $this->provider = new FormAssemblyProvider($this->token);
    }

    /**
     * @return FormAssemblyProvider
     */
    public function getProviderInstance()
    {
        return $this->provider;
    }
}
