<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithdrawalHistory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'users_id',
        'withdrawal_amount',
        'deduction',
        'withdraw_from',
        'transaction_reference',
        'withdrawal_status',
        'remarks'
    ];

    public static function addWithdrawalHistory($data) {
        self::Create($data);
    }

    /* Update the WithdrawalHistory based on Id
    */
    public static function updateWithdrawalHistory($id, $data)
    {
        self::where('id', $id)->update($data);
    }

    // check any value exist in WithdrawalHistory
    public static function checkExist($condition)
    {
        return self::where($condition)->first();
    }

    public static function viewWithdrawalHistory($filter) {
        $data = self::select('users.login_id','users.name','users.email','users.wallet_address','withdrawal_histories.id','withdrawal_histories.users_id', 'withdrawal_histories.withdrawal_amount', 'withdrawal_histories.deduction', 'withdrawal_histories.withdraw_from', 'withdrawal_histories.transaction_reference', 'withdrawal_histories.withdrawal_status', 'withdrawal_histories.remarks', 'withdrawal_histories.created_at')
                ->join('users', 'withdrawal_histories.users_id', '=', 'users.id');
        
        if (isset($filter['withdrawalStatus'])) {
            $data = $data->where('withdrawal_histories.withdrawal_status', $filter['withdrawalStatus']);
        }

        if (isset($filter['withdrawalFrom'])) {
            $data = $data->where('withdrawal_histories.withdraw_from', $filter['withdrawalFrom']);
        }

        if (isset($filter['users_id'])) {
            $data = $data->where('withdrawal_histories.users_id', $filter['users_id']);
        }

        if (isset($filter['withdrawal_histories_id'])) {
            $data = $data->where('withdrawal_histories.id', $filter['withdrawal_histories_id']);
            return $data->first();
        }

        return $data->orderBy('withdrawal_histories.created_at', 'desc')->get();
    }
}
