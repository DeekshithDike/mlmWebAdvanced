<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BinaryTreeRight extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['users_id','child_id','child_position'];

    public static function addBinaryTreeRight($data) {
        self::Create($data);
    }

    /* Update the BinaryTreeRight based on Id
    */
    public static function updateBinaryTreeRight($id, $data)
    {
        self::where('id', $id)->update($data);
    }

    // check any value exist in BinaryTreeRight
    public static function checkExist($condition)
    {
        return self::where($condition)->first();
    }

    public static function getRightMostId($condition)
    {
        return self::where($condition)->latest('id')->first();
    }

    public function getActiveActivations(){
        return $this->hasMany('App\Models\ActivationHistory', 'users_id', 'userID')
            ->where('activation_histories.activation_status', 'ACTIVATED')
            ->select('activation_histories.users_id', 'activation_histories.packages_id', 'activation_histories.packages_name', 'activation_histories.activation_amount');   
    }

    public static function viewRightBusinessAndCount($filter) {
        $data = self::select('binary_tree_rights.users_id', 'binary_tree_rights.child_id', 'binary_tree_rights.child_position', 'activation_histories.activation_amount')
                    ->join('activation_histories', 'binary_tree_rights.child_id', '=', 'activation_histories.users_id');

        if (isset($filter['activation_status'])) {
            $data = $data->where('activation_histories.activation_status', '=', $filter['activation_status']);
        }
        
        if (isset($filter['users_id'])) {
            $data = $data->where('binary_tree_rights.users_id', '=', $filter['users_id']);
        }

        if (isset($filter['date'])) {
            $data = $data->whereDate('binary_tree_rights.created_at', '=', $filter['date']);
        }

        $data = $data->groupBy('binary_tree_rights.child_id');
        if (isset($filter['count'])) {
            return $data->count();
        } elseif (isset($filter['sum'])) {
            return $data->sum('activation_histories.activation_amount');
        } else {
            return false;
        }
    }
}
