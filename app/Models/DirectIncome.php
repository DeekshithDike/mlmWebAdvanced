<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DirectIncome extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'users_id',
        'referred',
        'amount',
        'status'
    ];

    public static function addDirectIncome($data) {
        self::Create($data);
    }

    /* Update the DirectIncome based on Id
    */
    public static function updateDirectIncome($id, $data)
    {
        self::where('id', $id)->update($data);
    }

    // check any value exist in DirectIncome
    public static function checkExist($condition)
    {
        return self::where($condition)->first();
    }

    public static function viewDirectIncome($filter)
    {
        $data = self::select('users.login_id','users.name','direct_incomes.users_id', 'direct_incomes.referred', 'direct_incomes.amount', 'direct_incomes.status', 'direct_incomes.created_at')
                ->join('users', 'direct_incomes.users_id', '=', 'users.id');

        if (isset($filter['status'])) {
            $data = $data->where('direct_incomes.status', $filter['status']);
        }

        if (isset($filter['users_id'])) {
            $data = $data->where('direct_incomes.users_id', $filter['users_id']);
        }

        return $data->get();
    }

    public static function getDirectIncomeSum($filter) {
        if (isset($filter['users_id'])) {
            return self::where('users_id', '=', $filter['users_id'])->sum('amount');
        }
        return self::sum('amount');
    }
}
