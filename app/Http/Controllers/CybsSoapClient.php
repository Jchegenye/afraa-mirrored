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

    function __construct($options=array()){

        // if (env('APP_ENV') == "local") {

            $this->wsdl = "https://ics2wstesta.ic3.com/commerce/1.x/transactionProcessor/CyberSourceTransaction_1.109.wsdl";
            $this->transactionKey = "gsAN62dsI+Qio7M4WaWwbBFVhq8hdtkJwQGvQaLQ50VdIeAtF3PLzOro2tk5ngaPddL7PISAONSBNd0gYJ0n2+/RBjA0W7sCauZZe6CFtk1OgthrD6nhtuuZ9NUyAAnZwmrz8n1rwlg4DMT8qWpcPQqliN6cp8gzXNB3hBIMpMYDCWN3QZnt7A3gxYwmMYOLDOfH48zbNJwTNCJi/I1fsJe6LnWFPKlivroU7OLwuxFmiKx94C1HMIEcjRYlHsVlRZW6zMBPz43lknSlOS1oYxdnULj/hn086WhFoDmk58ScNRZTry5Pv/6fOxelqqewGz9G7rK8/EHmXVbKJVdOUw==";

        // } else{

        //     $this->wsdl = env('LIVE_WSDL');
        //     $this->transactionKey = env('LIVE_TRANSACTION_KEY');

        // }

        parent::__construct($this->wsdl, $options);

        $this->merchantId = "bbk_afraa_7319874_usd";

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
