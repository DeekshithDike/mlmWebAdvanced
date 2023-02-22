<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RewardHistory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'users_id', 'reward_business', 'reward_cash', 'created_at', 'updated_at'
    ];

    public static function addRewardHistory($data) {
        self::Create($data);
    }

    /* Update the RewardHistory based on Id
    */
    public static function updateRewardHistory($id, $data)
    {
        self::where('id', $id)->update($data);
    }

    // check any value exist in RewardHistory
    public static function checkExist($condition)
    {
        return self::where($condition)->first();
    }

    public static function viewRewardHistory($filter)
    {
        $data = self::select('users.login_id','reward_histories.id','reward_histories.users_id', 'reward_histories.reward_business', 'reward_histories.reward_cash', 'reward_histories.created_at')
                ->join('users', 'reward_histories.users_id', '=', 'users.id');
        
        if (isset($filter['users_id'])) {
            $data = $data->where('reward_histories.users_id', $filter['users_id']);
        }

        return $data->orderBy('reward_histories.created_at', 'desc')->get();
    }
}
