<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'coinbase' => [
        'endpoint' => env('COINBASE_API_END_POINT'),
        'key' => env('COINBASE_API_KEY'),
        'webhooksecret' => env('WEBHOOK_SECRET')
    ],

    'coinpayments' => [
        'marchantid' => env('COINPAYMENT_MARCHANT_ID'),
        'publickey' => env('COINPAYMENT_PUBLIC_KEY'),
        'privatekey' => env('COINPAYMENT_PRIVATE_KEY'),
        'ipnsecret' => env('COINPAYMENT_IPN_SECRET')
    ],

    'nodeapi' => [
        'endpoint' => env('API_BASE_URL')
    ],

    'withdrawalcharges' => [
        'working' => env('WORKING_WITHDRAWAL'),
        'roi' => env('ROI_WITHDRAWAL')
    ],

];
