<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoiIncome extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'users_id',
        'paid_amount',
        'activation_histories_id',
        'payment_date'
    ];

    public static function addRoiIncome($data) {
        self::Create($data);
    }

    /* Update the RoiIncome based on Id
    */
    public static function updateRoiIncome($id, $data)
    {
        self::where('id', $id)->update($data);
    }

    // check any value exist in RoiIncome
    public static function checkExist($condition)
    {
        return self::where($condition)->first();
    }

    public static function viewRoiIncome($filter)
    {
        $data = self::select('users.login_id','users.name','roi_incomes.users_id', 'roi_incomes.paid_amount', 'roi_incomes.activation_histories_id', 'roi_incomes.payment_date', 'roi_incomes.created_at')
                ->join('users', 'roi_incomes.users_id', '=', 'users.id');

        if (isset($filter['users_id'])) {
            $data = $data->where('roi_incomes.users_id', $filter['users_id']);
        }

        return $data->orderBy('roi_incomes.payment_date', 'desc')->get();
    }

    public static function getRoiIncomeSum($filter) {
        if (isset($filter['users_id'])) {
            return self::where('users_id', '=', $filter['users_id'])->sum('paid_amount');
        }
        return self::sum('paid_amount');
    }
}
