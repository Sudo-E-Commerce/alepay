<?php

namespace Sudo\Pay\Models;

use Exception;

class Onepay {
    protected $accessCode = ""; 
    protected $merchant = "";  
    protected $secureCode = ""; 
    protected $returnUrl = "";

    protected $env = 'test';
    protected $baseUrl = array(
        'test' => 'https://mtf.onepay.vn/paygate/vpcpay.op',
        'live' => 'https://onepay.vn/paygate/vpcpay.op'
    );

    public function __construct($opts)
    {
        if(isset($opts) && !empty($opts['accessCode'])){
            $this->accessCode = $opts['accessCode'];
        }else {
            throw new Exception('Access Code is required !');
        }

        if(isset($opts) && !empty($opts['merchant'])){
            $this->merchant = $opts['merchant'];
        }else {
            throw new Exception('Merchant is required !');
        }

        if(isset($opts) && !empty($opts['secureCode'])){
            $this->secureCode = $opts['secureCode'];
        }else {
            throw new Exception('Secure Code is required !');
        }

        if(isset($opts) && !empty($opts['returnUrl'])){
            $this->returnUrl = $opts['returnUrl'];
        }else {
            throw new Exception('Return Url is required !');
        }

        if(isset($opts) && !empty($opts['env'])){
            $this->env = $opts['env'];
        }else {
            throw new Exception('env is required !');
        }
    }

    public function sentRequestToOnepay($onepay)
    {
        $md5HashData = "";
        $onepay['vpc_AccessCode'] = $this->accessCode;
        $onepay['vpc_Merchant'] = $this->merchant;
        $onepay['vpc_ReturnURL'] = $this->returnUrl;
        ksort ($onepay);
        $appendAmp = 0;
        $vpcURL = $this->baseUrl[$this->env];
        $vpcURL .= '?';
        foreach($onepay as $key => $value) {
            if (strlen($value) > 0) {
                if ($appendAmp == 0) {
                    $vpcURL .= urlencode($key) . '=' . urlencode($value);
                    $appendAmp = 1;
                } else {
                    $vpcURL .= '&' . urlencode($key) . "=" . urlencode($value);
                }
                if ((strlen($value) > 0) && ((substr($key, 0,4)=="vpc_") || (substr($key,0,5) =="user_"))) {
                    $md5HashData .= $key . "=" . $value . "&";
                }
            }
        }

        $md5HashData = rtrim($md5HashData, "&");
        if (strlen($this->secureCode) > 0) {
            $vpcURL .= "&vpc_SecureHash=" . strtoupper(hash_hmac('SHA256', $md5HashData, pack('H*',$this->secureCode)));
        }

        return $vpcURL;
    }
}