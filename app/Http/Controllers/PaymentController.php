<?php

namespace Afraa\Http\Controllers;

use Afraa\Payment;
use Afraa\Events;
use Afraa\Model\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Afraa\Http\Controllers\CybsSoapClient;
use Afraa\Http\Controllers\CountryCodes;

class PaymentController extends Controller
{

    private $accountNumber;
    private $expirationMonth;
    private $expirationYear;
    private $grandTotalAmount = "1";
    private $currency = "USD";
    private $current_event = "asc_8";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('layouts.dashboard.payment.index');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function store(Request $request)
    {
        //
        $this->accountNumber = $request->get('account_number');
        $this->expirationMonth = $request->get('expiration_month');
        $this->expirationYear = $request->get('expiration_year');

        if($this->makePayment() == true){

            return redirect()->back()->with('success', 'Payment Successful');

        }

        return redirect()->back()->with('warning', 'Sorry! Payment not Successful, Please Try Again');

    }

    /**
     *  Prepare billing info
     *
     * @return Object | $billTo
    */

    private function billingDetails(){

        $id = Auth::id();

        $get_users = new Users();

        $user_by_id = $get_users->getUserById($id);

        $countryCode = new CountryCodes();

        $billTo = new \stdClass();

        foreach ($user_by_id as $key => $user) {

            list($firstName, $lastName) = explode(" ", $user->name);

            $billTo->firstName = $firstName;
            $billTo->lastName = $lastName;
            $billTo->street1 = $user->Business_Address;
            $billTo->city = $countryCode->getCodeName($user->country);
            $billTo->state = $countryCode->getCodeName($user->country);
            $billTo->postalCode = $countryCode->getCodeName($user->country);
            $billTo->country = $countryCode->getCodeName($user->country);
            $billTo->email = $user->email;
            $billTo->ipAddress = $this->getClientIP();

        }

        return $billTo;
    }

    /**
     *  prepare card details
     *
     *  @return Object | $card
    */
    private function cardDetails(){

        $card = new \stdClass();
        $card->accountNumber = $this->accountNumber;
        $card->expirationMonth = $this->expirationMonth;
        $card->expirationYear = $this->expirationYear;

        return $card;
    }

    /**
     *  prepare purchase info
     *
     *  @return Object | $purchaseTotals
    */
    private function purchaseDetails(){

        $purchaseTotals = new \stdClass();
        $purchaseTotals->currency = $this->currency;
        $purchaseTotals->grandTotalAmount = $this->grandTotalAmount;

        return $purchaseTotals;
    }

    /**
    *   get the clients ip address
    *
    *   @return String | IP Address
    */
    private function getClientIP() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

    /**
     *  make payment
     *
     * @return bool | payment status
     */
    public function makePayment(){

        $billTo = $this->billingDetails();
        $card = $this->cardDetails();
        $purchaseTotals = $this->purchaseDetails();

        //reference code
        $referenceCode = env('MERCHANT_ID');

        $client = new CybsSoapClient();
        $request = $client->createRequest($referenceCode);

        // Build a sale request (combining an auth and capture). In this example only
        // the amount is provided for the purchase total.
        $ccAuthService = new \stdClass();
        $ccAuthService->run = 'true';
        $request->ccAuthService = $ccAuthService;

        $ccCaptureService = new \stdClass();
        $ccCaptureService->run = 'true';
        $request->ccCaptureService = $ccCaptureService;

        //attach our request to billing info
        $request->billTo = $billTo;

        //attach our request to card  details
        $request->card = $card;

        //attach our request to purchase info
        $request->purchaseTotals = $purchaseTotals;

        $reply = $client->runTransaction($request);

        $json_reply = json_encode($reply,JSON_PRETTY_PRINT);

        $if_paid = $this->savePaymentData($json_reply);

        return $if_paid;
    }

    /**
     *  save Payment Data to database
     *
     *  @param json | $data
     *
     *  @return bool | status
    */
    public function savePaymentData($data){


        $event = new Events();
        //get data response
        $data = json_decode($data, true);

        $requestID = $data["requestID"];
        $decision = $data["decision"];

        if(isset($data["purchaseTotals"]["currency"]) && isset($data['ccAuthReply']["amount"]) && isset($data['ccAuthReply']["authorizationCode"]) && isset($data['ccAuthReply']["authorizedDateTime"]) && isset($data['ccAuthReply']["reconciliationID"]) && isset($data['ccAuthReply']["paymentNetworkTransactionID"]) && isset($data["receiptNumber"])){

            $currency = $data["purchaseTotals"]["currency"];
            $amount = $data['ccAuthReply']["amount"];
            $authorizationCode = $data['ccAuthReply']["authorizationCode"];
            $authorizedDateTime = $data['ccAuthReply']["authorizedDateTime"];
            $reconciliationID = $data['ccAuthReply']["reconciliationID"];
            $paymentNetworkTransactionID = $data['ccAuthReply']["paymentNetworkTransactionID"];
            $receiptNumber = $data["receiptNumber"];

        }

        if($decision !== "REJECT"){

            $id = Auth::id();

            $payment = new Payment;

            $payment->user_id = $id;
            $payment->requestID = $requestID;
            $payment->decision = $decision;
            $payment->currency = $currency;
            $payment->amount = $amount;
            $payment->authorizationCode = $authorizationCode;
            $payment->authorizedDateTime = $authorizedDateTime;
            $payment->reconciliationID = $reconciliationID;
            $payment->paymentNetworkTransactionID = $paymentNetworkTransactionID;
            $payment->receiptNumber = $receiptNumber;

            $payment->save();

            if ($decision === "ACCEPT") {
                $status = "PAID";
                $event->updatePaymentStatus($status);
            }

            return true;

        }else{

            $event->updatePaymentStatus($decision);

            return false;

        }

        return false;
    }
}
