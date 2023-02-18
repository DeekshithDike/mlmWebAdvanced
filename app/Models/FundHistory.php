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
    protected $fillable = ['order_id','users_id','amount','fund_status','coinbase_charges_id','payment_url','created_by'];

    public static function addFundHistory($data) {
        self::Create($data);
    }

    /* Update the FundHistory based on Id
    */
    public static function updateFundHistory($id, $data)
    {
        self::where('id', $id)->update($data);
    }

    /* Update the FundHistory based on coinbase_charges_id
    */
    public static function updateFundHistoryByChargeId($coinbase_charges_id, $data)
    {
        self::where('coinbase_charges_id', $coinbase_charges_id)->update($data);
    }

    /* Fetch FundHistory data
    */
    public static function getAllFundHistory($filter)
    {
        $data = self::select('users.login_id','users.name','users.email','users.mobile_no','fund_histories.id', 'fund_histories.order_id', 'coinpayment_transactions.txn_id', 'coinpayment_transactions.status_url','coinpayment_transactions.type', 'fund_histories.users_id', 'fund_histories.amount', 'fund_histories.fund_status','fund_histories.payment_url','fund_histories.created_by', 'fund_histories.created_at')
                ->join('users', 'fund_histories.users_id', '=', 'users.id')
                ->join('coinpayment_transactions', 'fund_histories.order_id', '=', 'coinpayment_transactions.order_id');
                

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
        
        return $data->orderBy('fund_histories.created_at', 'desc')->get();
    }

    public static function getAdminAllFundHistory($filter)
    {
        $data = self::select('users.login_id','users.name','users.email','users.mobile_no','fund_histories.id', 'fund_histories.order_id', 'fund_histories.users_id', 'fund_histories.amount', 'fund_histories.fund_status','fund_histories.payment_url','fund_histories.created_by','fund_histories.created_at')
                ->join('users', 'fund_histories.users_id', '=', 'users.id');
                

        if (isset($filter['userId'])) {
            $data=$data->where('fund_histories.users_id', $filter['userId']);
        }

        if (isset($filter['status'])) {
            $data=$data->where('fund_histories.fund_status', $filter['status']);
        }

        if (isset($filter['created_by'])) {
            $data=$data->where('fund_histories.created_by', $filter['created_by']);
        }

        if (isset($filter['fund_histories_id'])) {
            $data=$data->where('fund_histories.id', $filter['fund_histories_id']);
            return $data->first();
        }
        
        return $data->orderBy('fund_histories.created_at', 'desc')->get();
    }
}
