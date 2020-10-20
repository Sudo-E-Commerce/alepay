<?php

namespace Sudo\Pay\Http\Controllers;

use Sudo\Pay\Models\Alepay;
use Sudo\Pay\Models\Onepay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PayController
{
    public function demoAlepay()
    {
        return view('Pay::alepay');
    }

    public function alepaySetup(Request $request)
    {
        $orderInfo = [
            'cancelUrl' => $request['cancelUrl'], 
            'amount' => $request['amount'], 
            'orderCode' => $request['orderCode'], 
            'currency' => $request['currency'] ?? 'vnd',
            'orderDescription' => $request['orderDescription'],
            'totalItem' => $request['totalItem'], 
            'checkoutType' => $request['checkoutType'], 
            'allowDomestic' => $request['allowDomestic'], 

            'buyerName' => $request['buyerName'],
            'buyerEmail' => $request['buyerEmail'],
            'buyerPhone' => $request['buyerPhone'],
            'buyerAddress' => $request['buyerAddress'],
            'buyerCity' => $request['buyerCity'] ?? 'Ha Noi',
            'buyerCountry' => $request['buyerCountry'] ?? 'Viet Nam',

        ];

        $this->alepay($orderInfo); 
    }

    private function alepay($orderInfo)
    {
        $config = array(
            "apiKey" => config('pay.alepay')['apiKey'], 

            "encryptKey" => config('pay.alepay')['encryptKey'], 
            
            "checksumKey" => config('pay.alepay')['checksumKey'], 
            
            "callbackUrl" => config('pay.alepay')['callbackUrl'],
            
            "env" =>  config('pay.alepay')['env'],
        );


        $alepay = new Alepay($config);
        $data = array();
        $data = $orderInfo;

        $result = $alepay->sendOrderToAlepay($data);

        if (isset($result) && !empty($result->checkoutUrl)) {
            echo '<meta http-equiv="refresh" content="0;url=' . $result->checkoutUrl. '">';
        } else {
            echo $result->errorDescription;
        }
    }

    public function alepayResult(Request $request)
    {
        dd($request->all());
    }

    public function demoOnepay()
    {
        return view('Pay::onepay');
    }

    public function onepaySetup(Request $request)
    {
        $againlink = urlencode($_SERVER['HTTP_REFERER']);
        $ticketno = $_SERVER['REMOTE_ADDR'];

        $orderInfo = [
            // Các tham số tĩnh
            'vpc_Version'=>'2',
            'vpc_Command'=>'pay',
            'vpc_Locale'=>'vn',

            // Các tham số website gán giá trị động
            'vpc_MerchTxnRef'=> date('YmdHis') . rand(),
            'vpc_OrderInfo'=> $request['order_id'],
            'vpc_Amount'=> $request['amount']*100,
            'vpc_TicketNo'=> $ticketno,
            'AgainLink'=> $againlink,

            'vpc_Customer_Email'=> $request['email'],
            'vpc_Customer_Id'=> $request['id'],
            'vpc_Customer_Phone'=> $request['phone'],

            'vpc_SHIP_City'=> $request['province'],
            'vpc_SHIP_Country'=> 'Viet Nam',
            'vpc_SHIP_Provice'=> $request['district'],
            'vpc_SHIP_Street01'=> $request['address'],
        ];

        $config = array(
            'accessCode' => config('pay.onepay')['accessCode'],

            'merchant' => config('pay.onepay')['merchant'],
            
            'secureCode' => config('pay.onepay')['secureCode'],

            'returnUrl' => config('pay.onepay')['returnUrl'],

            'env' => config('pay.onepay')['env']
        );

        $onepay = new Onepay($config);
        $url = $onepay->sentRequestToOnepay($orderInfo);
        return Redirect::to($url);
    }

    public function onepayResult(Request $request)
    {
        $data = $request->all();
        return view('Pay::onepay_result',compact('data'));
    }
}