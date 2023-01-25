<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FundHistory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['users_id','amount','fund_status','coinbase_charges_id'];

    public static function addFundHistory($data) {
        self::Create($data);
    }

    /* Update the FundHistory based on Id
    */
    public static function updateFundHistory($id, $data)
    {
        self::where('id', $id)->update($data);
    }

    /* Fetch FundHistory data
    */
    public static function getAllFundHistory($filter)
    {
        $data = self::select('users.login_id','users.name','users.email','users.mobile_no','fund_histories.id', 'fund_histories.users_id', 'fund_histories.amount', 'fund_histories.fund_status', 'fund_histories.created_at', 'coinbase_charges.charges_id', 'coinbase_charges.charges_code')
                ->join('coinbase_charges', 'fund_histories.coinbase_charges_id', '=', 'coinbase_charges.id')
                ->join('users', 'fund_histories.users_id', '=', 'users.id')
                ->where('coinbase_charges.payment_for', '=', 'ADD_FUND');
                

        if (isset($filter['userId'])) {
            $data=$data->where('fund_histories.users_id', $filter['userId']);
        }

        if (isset($filter['status'])) {
            $data=$data->where('fund_histories.fund_status', $filter['status']);
        }

        if (isset($filter['fund_histories_id'])) {
            $data=$data->where('fund_histories.id', $filter['fund_histories_id']);
            return $data->first();
        }
        
        return $data->get();
    }

    public static function getAdminAllFundHistory($filter)
    {
        $data = self::select('users.login_id','users.name','users.email','users.mobile_no','fund_histories.id', 'fund_histories.users_id', 'fund_histories.amount', 'fund_histories.fund_status', 'fund_histories.created_at')
                ->join('users', 'fund_histories.users_id', '=', 'users.id');
                

        if (isset($filter['userId'])) {
            $data=$data->where('fund_histories.users_id', $filter['userId']);
        }

        if (isset($filter['status'])) {
            $data=$data->where('fund_histories.fund_status', $filter['status']);
        }

        if (isset($filter['coinbase_charges_id'])) {
            $data=$data->where('fund_histories.coinbase_charges_id', null);
        }

        if (isset($filter['fund_histories_id'])) {
            $data=$data->where('fund_histories.id', $filter['fund_histories_id']);
            return $data->first();
        }
        
        return $data->get();
    }
}
