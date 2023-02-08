<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferHistory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'users_id', 'transfer_type', 'transferred_amount', 'transferred_to'
    ];

    public static function addTransferHistory($data) {
        self::Create($data);
    }

    /* Update the TransferHistory based on Id
    */
    public static function updateTransferHistory($id, $data)
    {
        self::where('id', $id)->update($data);
    }

    // check any value exist in TransferHistory
    public static function checkExist($condition)
    {
        return self::where($condition)->first();
    }

    public static function viewTransferHistory($filter)
    {
        $data = self::select('users.login_id','users.name','transfer_histories.users_id', 'transfer_histories.transfer_type', 'transfer_histories.transferred_amount', 'transfer_histories.transferred_to', 'transfer_histories.created_at')
                ->join('users', 'transfer_histories.users_id', '=', 'users.id');

        if (isset($filter['users_id'])) {
            $data = $data->where('transfer_histories.users_id', $filter['users_id']);
        }

        if (isset($filter['transfer_type'])) {
            $data = $data->where('transfer_histories.transfer_type', $filter['transfer_type']);
        }


        return $data->orderBy('transfer_histories.created_at', 'desc')->get();
    }
}
