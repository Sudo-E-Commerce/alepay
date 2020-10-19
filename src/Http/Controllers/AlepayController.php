<?php

namespace Sudo\Alepay\Http\Controllers;

use Sudo\Alepay\Models\Alepay;
use Illuminate\Http\Request;

class AlepayController
{
    public function demo()
    {
        return view('Alepay::demo');
    }

    public function paySetup(Request $request) // Trả thẳng
    {
        $orderInfo = [
            'cancelUrl' => $request['cancelUrl'], 
            'amount' => $request['amount'], 
            'orderCode' => $request['orderCode'], 
            'currency' => $request['currency'],
            'orderDescription' => $request['orderDescription'],
            'totalItem' => $request['totalItem'], 
            'checkoutType' => $request['checkoutType'], 
            'allowDomestic' => $request['allowDomestic'], 

            'buyerName' => $request['buyerName'],
            'buyerEmail' => $request['buyerEmail'],
            'buyerPhone' => $request['buyerPhone'],
            'buyerAddress' => $request['buyerAddress'],
            'buyerCity' => $request['buyerCity'],
            'buyerCountry' => $request['buyerCountry'],

        ];

        $this->alepay($orderInfo); 
    }

    private function alepay($orderInfo)
    {
        $config = array(
            //Là key dùng để xác định tài khoản nào đang được sử dụng.
            "apiKey" => config('alepay.tokenKey'), 
            
            //Là key dùng để mã hóa dữ liệu truyền tới Alepay.
            "encryptKey" => config('alepay.encryptKey'), 
            
            //Là key dùng để tạo checksum data.
            "checksumKey" => config('alepay.checksumKey'), 
            
            "callbackUrl" => config('alepay.callbackUrl'),
            
            // môi trường chạy
            "env" =>  config('alepay.env'),
        );

        $alepay = new Alepay($config);
        $data = array();
        $data['cancelUrl'] = $orderInfo['cancelUrl'];
        $data['amount'] = $orderInfo['amount'];
        $data['orderCode'] = $orderInfo['orderCode'];
        $data['currency'] = 'vnd';
        $data['orderDescription'] = $orderInfo['orderDescription'];
        $data['totalItem'] = $orderInfo['totalItem'];
        $data['checkoutType'] = $orderInfo['checkoutType'];
                                // 0: Cho phép thanh toán ngay với thẻ quốc tế và
                                // trả góp
                                // 1: chỉ thanh toán ngay với thẻ quốc tế
                                // 2: Chỉ thanh toán trả góp
                                // 3: Thanh toán ngay với thẻ ATM, IB, QRCODE
                                // , thẻ quốc tế và thanh toán trả góp nếu thiết lập
                                // allowDomestic = true
                                // 4: Thanh toán ngay với thẻ ATM, IB, QRCODE
                                // , thẻ quốc tế nếu thiết lập allowDomestic = true
        $data['allowDomestic'] = $orderInfo['allowDomestic'];

        $data['buyerName'] = $orderInfo['buyerName'];
        $data['buyerEmail'] = $orderInfo['buyerEmail'];
        $data['buyerPhone'] = $orderInfo['buyerPhone'];
        $data['buyerAddress'] = $orderInfo['buyerAddress'];
        $data['buyerCity'] = $orderInfo['buyerCity'];
        $data['buyerCountry'] = $orderInfo['buyerCountry'];

        $result = $alepay->sendOrderToAlepay($data);

        if (isset($result) && !empty($result->checkoutUrl)) {
            echo '<meta http-equiv="refresh" content="0;url=' . $result->checkoutUrl. '">';
        } else {
            echo $result->errorDescription;
        }
    }
}