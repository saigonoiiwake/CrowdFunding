<?php

return [

    /*
    |--------------------------------------------------
    | For MPG Trade API
    |--------------------------------------------------
    |
    | 這是用來進行MPG交易的相關設定，每項皆為必填
    |
     */
    'mpg' => [
        'MerchantID' => env('SPGATEWAY_MERCHANT_ID', 'MS3117631225'),
        'HashKey' => env('SPGATEWAY_HASH_KEY', 'fObIEsx4fd4YDDRN2RRZAUHhV6W1k7nj'),
        'HashIV' => env('SPGATEWAY_HASH_IV', 'NmAfpRB1jNUzjc5Z'),
        'ReturnURL' => env('SPGATEWAY_RETURN_URL', 'http://127.0.0.1'),
        'NotifyURL' => env('SPGATEWAY_NOTIFY_URL', 'http://127.0.0.1'),
    ],

    /*
    |--------------------------------------------------
    | For Create Merchant API
    |--------------------------------------------------
    |
    | 這是用來建立智付通商店的相關設定，每項皆為必填
    |
     */
    'CompanyKey' => env('SPGATEWAY_COMPANY_KEY', ''),
    'CompanyIV' => env('SPGATEWAY_COMPANY_IV', ''),
    'PartnerID' => env('SPGATEWAY_PARTNER_ID', ''),
    'MerchantIDPrefix' => env('SPGATEWAY_MERCHANT_ID_PREFIX', ''),

    /*
    |--------------------------------------------------
    | For Create Receipt API
    |--------------------------------------------------
    |
    | 這是用來開立智付通發票的相關設定，每項皆為必填
    |
     */
    'receipt' => [
        'HashKey' => env('SPGATEWAY_RECEIPT_KEY'),
        'HashIV' => env('SPGATEWAY_RECEIPT_IV'),
        'MerchantID' => env('SPGATEWAY_RECEIPT_MERCHANT_ID', 'MS3117631225'),
    ],
];
