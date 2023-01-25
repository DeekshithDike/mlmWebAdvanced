<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BinaryIncome extends Model
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
        'left_business',
        'right_business',
        'total_business',
        'status',
        'payment_date'
    ];

    public static function addBinaryIncome($data) {
        self::Create($data);
    }

    /* Update the BinaryIncome based on Id
    */
    public static function updateBinaryIncome($id, $data)
    {
        self::where('id', $id)->update($data);
    }

    // check any value exist in BinaryIncome
    public static function checkExist($condition)
    {
        return self::where($condition)->first();
    }

    public static function viewBinaryIncome($filter)
    {
        $data = self::select('users.login_id','users.name','binary_incomes.users_id', 'binary_incomes.paid_amount', 'binary_incomes.left_business', 'binary_incomes.right_business', 'binary_incomes.total_business', 'binary_incomes.status', 'binary_incomes.payment_date')
                ->join('users', 'binary_incomes.users_id', '=', 'users.id');

        if (isset($filter['status'])) {
            $data = $data->where('binary_incomes.status', $filter['status']);
        }

        if (isset($filter['users_id'])) {
            $data = $data->where('binary_incomes.users_id', $filter['users_id']);
        }
        
        return $data->get();
    }

    public static function getBinaryIncomeSum($filter) {
        if (isset($filter['users_id'])) {
            return self::where('users_id', '=', $filter['users_id'])->sum('paid_amount');
        }
        return self::sum('paid_amount');
    }
}
