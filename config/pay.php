<?php

return [
    'alepay' => [
        'apiKey' => 'a7MXiRDwB16MxDdoUXSVht0Znvtwur',
    
        'encryptKey' => 'MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDJhUEQ6EffPU6UeFNMNC9tNoSgjzsrVDtOwbV4rn+j12YTO+wvyXwTGon/0EB9cLKtta8419EAXLSMmq7ctLGbrkdUPXr78LfRsqEywumrBjHgiGGDXNatiYOr9zo56t6nBimKGPDiCtF4J/wFOw9t3W0CcXtcGnmsCvWpOo4GEwIDAQAB',
        
        'checksumKey' => 'GPQ4PSjeiiDsIzqBdzeWFegOfPdsIu',
    
        'callbackUrl' => 'http://localhost:8000/ket-qua-alepay',
        
        // Môi trường hoạt động: dev, test, live
        'env' => 'test'
    ],

    'onepay' => [
        'accessCode' => '6BEB2546',
        
        'merchant' => 'TESTONEPAY',
        
        'secureCode' => '6D0870CDE5F24F34F3915FB0045120DB',

        'returnUrl' => 'http://localhost:8000/ket-qua-onepay',  // link nhận kết quả trả về

        'env' => 'test' // Môi trường: test, live
    ]
];


// ALEPAY 
// Tk: user@yopmail.com
// Pass: Alepay123            
// - Token Key: a7MXiRDwB16MxDdoUXSVht0Znvtwur
// - Encrypt Key: MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDJhUEQ6EffPU6UeFNMNC9tNoSgjzsrVDtOwbV4rn+j12YTO+wvyXwTGon/0EB9cLKtta8419EAXLSMmq7ctLGbrkdUPXr78LfRsqEywumrBjHgiGGDXNatiYOr9zo56t6nBimKGPDiCtF4J/wFOw9t3W0CcXtcGnmsCvWpOo4GEwIDAQAB
// - Checksum Key: GPQ4PSjeiiDsIzqBdzeWFegOfPdsIu

// ONEPAY

// accessCode : 6BEB2546
// merchant: TESTONEPAY
// secureCode: 6D0870CDE5F24F34F3915FB0045120DB