<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivationHistory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['users_id', 'login_id', 'packages_id', 'activation_amount', 'packages_name', 'packages_min_amount', 'packages_max_amount', 'packages_roi', 'packages_referral', 'packages_binary', 'packages_capping', 'packages_duration', 'activation_status','activated_on','expiry_date','declined_on','activation_by','created_by'];

    public static function addActivationHistory($data) {
        self::Create($data);
    }

    /* Update the ActivationHistory based on Id
    */
    public static function updateActivationHistory($id, $data)
    {
        self::where('id', $id)->update($data);
    }

    // check any value exist in ActivationHistory
    public static function checkExist($condition)
    {
        return self::where($condition)->first();
    }

    public static function viewActivationHistory($filter) {
        $data = self::select('activation_histories.id', 'activation_histories.users_id', 'activation_histories.login_id', 'activation_histories.packages_id', 'activation_histories.activation_amount', 'activation_histories.packages_name', 'activation_histories.packages_min_amount', 'activation_histories.packages_max_amount', 'activation_histories.packages_roi', 'activation_histories.packages_referral', 'activation_histories.packages_binary', 'activation_histories.packages_capping', 'activation_histories.packages_duration', 'activation_histories.activation_status', 'activation_histories.created_at', 'activation_histories.activated_on', 'activation_histories.expiry_date', 'activation_histories.declined_on','activation_histories.activation_by','activation_histories.created_by');

        if (isset($filter['login_id'])) {
            if ($filter['isAffiliate']) {
                $data = $data->where('activation_histories.login_id', '!=', $filter['login_id'])
                            ->where('activation_histories.created_by', $filter['users_id']);
            } else {
                $data = $data->where('activation_histories.login_id', $filter['login_id']);
            }
        }

        if (isset($filter['activation_status'])) {
            $data = $data->where('activation_status', $filter['activation_status']);
        }

        if (isset($filter['activation_by'])) {
            $data = $data->where('activation_by', $filter['activation_by']);
        }

        if (isset($filter['activationId'])) {
            $data = $data->where('id', $filter['activationId']);
            return $data->first();
        }
        
        return $data->orderBy('activation_histories.created_at', 'desc')->get();
    }

    public static function activeTopOnePackage($filter) {
        $data = self::select('id','users_id', 'login_id','packages_referral');

        if (isset($filter['login_id'])) {
            $data = $data->where('login_id', $filter['login_id']);
        }

        if (isset($filter['users_id'])) {
            $data = $data->where('users_id', $filter['users_id']);
        }

        return $data->where('activation_status', '=', 'ACTIVATED')
                ->where('expiry_date', '>=', date('Y-m-d'))
                ->max('packages_referral');
    }

    public static function totalInvestment($filter) {
        $data = self::where('activation_status', '=', 'ACTIVATED');
        
        if (isset($filter['login_id'])) {
            $data = $data->where('login_id', $filter['login_id']);
        }

        if (isset($filter['users_id'])) {
            $data = $data->where('users_id', $filter['users_id']);
        }

        return $data->sum('activation_amount');
    }
}
