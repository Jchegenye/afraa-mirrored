<?php

namespace Afraa\Http\Controllers;

use SoapClient;

/**
 * CybsSoapClient
 *
 * An implementation of PHP's SOAPClient class for making CyberSource requests.
 */
class CybsSoapClient extends SoapClient{

    private $merchantId;
    private $transactionKey;

    private $wsdl;

    public $options=array();

    function __construct($options=array()){

        if (env('APP_ENV') == "local") {

            $this->wsdl = env('SANDBOX_WSDL');
            $this->transactionKey = env('SANDBOX_TRANSACTION_KEY');

        } else{

            $this->wsdl = env('LIVE_WSDL');
            $this->transactionKey = env('LIVE_TRANSACTION_KEY');

        }

        // $this->options=array('location' => $this->wsdl,
        // 'uri'      => "http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd");

        parent::__construct(null, array(
            'location' => $this->wsdl,
            'uri'      => "http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd")
        );

        $this->merchantId = env('MERCHANT_ID');

        $nameSpace = "http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd";

        $soapUsername = new \SoapVar(
            $this->merchantId,
            XSD_STRING,
            NULL,
            $nameSpace,
            NULL,
            $nameSpace
        );

        $soapPassword = new \SoapVar(
            $this->transactionKey,
            XSD_STRING,
            NULL,
            $nameSpace,
            NULL,
            $nameSpace
        );

        $auth = new \stdClass();
        $auth->Username = $soapUsername;
        $auth->Password = $soapPassword;

        $soapAuth = new \SoapVar(
            $auth,
            SOAP_ENC_OBJECT,
            NULL, $nameSpace,
            'UsernameToken',
            $nameSpace
        );

        $token = new \stdClass();
        $token->UsernameToken = $soapAuth;

        $soapToken = new \SoapVar(
            $token,
            SOAP_ENC_OBJECT,
            NULL,
            $nameSpace,
            'UsernameToken',
            $nameSpace
        );

        $security =new \SoapVar(
            $soapToken,
            SOAP_ENC_OBJECT,
            NULL,
            $nameSpace,
            'Security',
            $nameSpace
        );

        $header = new \SoapHeader($nameSpace, 'Security', $security, true);
        $this->__setSoapHeaders(array($header));
    }

    /**
     * @return string The client's merchant ID.
     */
    public function getMerchantId()
    {
        return $this->merchantId;
    }

    /**
     * @return string The client's transaction key.
     */
    public function getTransactionKey()
    {
        return $this->transactionKey;
    }

    /**
     * Returns an object initialized with basic client information.
     *
     * @param string $merchantReferenceCode Desired reference code for the request
     * @return stdClass An object initialized with the basic client info.
     */
    public function createRequest($merchantReferenceCode)
    {
        $request = new \stdClass();
        $request->merchantID = $this->merchantId;
        $request->merchantReferenceCode = $merchantReferenceCode;
        $request->clientLibrary = "CyberSource PHP 1.0.0";
        $request->clientLibraryVersion = phpversion();
        $request->clientEnvironment = php_uname();
        return $request;
    }
}
