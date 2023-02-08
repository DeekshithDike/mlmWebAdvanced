<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'login_id', 'name', 'email', 'mobile_no', 'country', 'password', 'sponsor_id', 'position', 'user_role', 'login_status', 'fund_wallet_amount', 'working_wallet_amount', 'roi_wallet_amount', 'remember_token', 'login_ip_address', 'reg_ip_address', 'last_login_datetime', 'profile_path'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /* Update the User based on Id
    */
    public static function updateUser($id, $data)
    {
        self::where('id', $id)->update($data);
    }


    // check any value exist in Users
    public static function checkExist($condition){
        return self::where($condition)->exists();
    }

    public static function getUsersDetails($condition)
    {
        return self::where($condition)->first();
    }

    public static function listDirectMembersById($login_id)
    {
        return self::select('users.id as userID', 'users.login_id', 'users.name', 'users.email', 'users.mobile_no', 'users.country', 'users.sponsor_id', 'users.position', 'users.created_at', 'users.profile_path')
                ->where('sponsor_id', '=', $login_id)
                ->where('login_id', '!=', $login_id)
                ->with('getActiveActivations')
                ->orderBy('users.created_at', 'desc')
                ->get();
    }

    public function getActiveActivations()
    {
        return $this->hasMany('App\Models\ActivationHistory', 'users_id', 'userID')
            ->where('activation_histories.activation_status', 'ACTIVATED')
            ->select('activation_histories.users_id', 'activation_histories.activation_amount');
    }

    public static function getWalletDetail($filter) {
        $data = self::select('id', 'login_id', 'sponsor_id', 'position', 'fund_wallet_amount', 'working_wallet_amount', 'roi_wallet_amount', 'wallet_address');

        if (isset($filter['users_id'])) {
            $data = $data->where('id', $filter['users_id']);
        }

        if (isset($filter['login_id'])) {
            $data = $data->where('login_id', $filter['login_id']);
        }

        return $data->first();
    }

    public static function listAllUsers($filter)
    {
        $data = self::select('users.id as userID', 'users.login_id', 'users.name', 'users.email', 'users.mobile_no', 'users.sponsor_id', 'users.position', 'users.fund_wallet_amount', 'users.fund_wallet_amount', 'users.fund_wallet_amount', 'users.working_wallet_amount', 'users.roi_wallet_amount', 'users.wallet_address', 'users.created_at', 'users.login_ip_address', 'users.reg_ip_address', 'users.last_login_datetime')
                ->with('getActiveActivations');
        
        if (isset($filter['login_status'])) {
            $data = $data->where('login_status', $filter['login_status']);
        }

        if (isset($filter['user_role'])) {
            $data = $data->where('user_role', $filter['user_role']);
        }
        
        return $data->orderBy('users.created_at', 'desc')->get();
    }
}
