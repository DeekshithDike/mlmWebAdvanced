<?php

namespace App\Library\Coinbase;

class Charges
{
    public static function createCharge($chargeData) {
        $client = new \GuzzleHttp\Client(self::getHttpHeaders('key'));
        $url = config('services.coinbase.endpoint').'/charges';
        $request = $client->request('POST', $url, ['json' => $chargeData]);
        return json_decode($request->getBody()->getContents());
    }

    public static function getHttpHeaders($key){
        $apiKey = config('services.coinbase.'.$key);
        return [
            'headers' => [
                'Content-Type' => 'application/json',
                'X-CC-Version' => '2018-03-22',
                'X-CC-Api-Key' => $apiKey,
            ],
            'http_errors' => false,
        ];
    }
}