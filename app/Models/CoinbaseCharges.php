<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoinbaseCharges extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['users_id','payment_for','charges_id','charges_code','latest_status'];

    public static function addCoinbaseCharges($data) {
        $result = self::Create($data);
        return $result->id;
    }

    /* Update the CoinbaseCharges based on Id
    */
    public static function updateCoinbaseCharges($id, $data )
    {
        self::where('id', $id)->update($data);
    }

    /* Update the CoinbaseCharges user id using charge code
    */
    public static function updateUserIdByChargeCode($chargeCode, $data)
    {
        self::where('charges_code', $chargeCode)->update($data);
    }
    
    public static function viewCoinbaseCharges()
    {
        return self::select('users.login_id','users.name','users.email','coinbase_charges.id', 'coinbase_charges.users_id', 'coinbase_charges.payment_for', 'coinbase_charges.charges_id', 'coinbase_charges.charges_code', 'coinbase_charges.created_at')
                ->join('users', 'coinbase_charges.users_id', '=', 'users.id')
                ->get();
    }

    // API to create charge
    public static function createCharge($chargeData) {
        $client = new \GuzzleHttp\Client(self::getHttpHeaders('key'));
        $url = config('services.coinbase.endpoint').'/charges';
        $request = $client->request('POST', $url, ['json' => $chargeData]);
        return json_decode($request->getBody()->getContents());
    }

    // Set header to call create charge API
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
