<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BinaryTreeLeft;
use App\Models\BinaryTreeRight;

class BinaryTree extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['users_id','sponsor_id','parent_id','child_position'];

    public static function addBinaryTree($data) {
        self::Create($data);
    }

    /* Update the BinaryTree based on Id
    */
    public static function updateBinaryTree($id, $data)
    {
        self::where('id', $id)->update($data);
    }

    // check any value exist in BinaryTree
    public static function checkExist($condition)
    {
        return self::where($condition)->first();
    }

    public static function getChild($parent_id, $position){
        return self::select('binary_trees.users_id', 'binary_trees.parent_id as parentId', 'users.id as userID', 'users.login_id', 'users.name', 'users.sponsor_id', 'users.position', 'users.country', 'users.created_at')
            ->join('users', 'binary_trees.users_id', '=', 'users.id')
            ->where('binary_trees.parent_id', $parent_id)
            ->where('binary_trees.child_position', $position)
            ->with('getActiveActivations')
            ->with('getLeftBusiness')
            ->with('getRightBusiness')
            ->with('getLoginIdByParentId')
            ->with('getCarryForwards')
            ->first();
    }

        public static function getMyBinaryTreeDet($users_id){
            return self::select('binary_trees.users_id', 'binary_trees.parent_id as parentId', 'users.id as userID', 'users.login_id', 'users.name', 'users.sponsor_id', 'users.position', 'users.country', 'users.created_at')
                ->join('users', 'binary_trees.users_id', '=', 'users.id')
                ->where('binary_trees.users_id', $users_id)
                ->with('getActiveActivations')
                ->with('getLeftBusiness')
                ->with('getRightBusiness')
                ->with('getLoginIdByParentId')
                ->with('getCarryForwards')
                ->first();
        }

        public function getCarryForwards() {
            return $this->hasOne('App\Models\CarryForward', 'users_id', 'userID')
                ->where('carry_forwards.status', '=', 0)
                ->select('carry_forwards.users_id', 'carry_forwards.amount', 'carry_forwards.position');   
        }

        public function getLeftBusiness(){
            return $this->hasMany('App\Models\BinaryTreeLeft', 'users_id', 'userID')
                ->join('activation_histories', 'binary_tree_lefts.child_id', '=', 'activation_histories.users_id')
                ->where('activation_histories.activation_status', 'ACTIVATED')
                ->select('binary_tree_lefts.users_id', 'activation_histories.activation_amount');   
        }

        public function getRightBusiness(){
            return $this->hasMany('App\Models\BinaryTreeRight', 'users_id', 'userID')
                ->join('activation_histories', 'binary_tree_rights.child_id', '=', 'activation_histories.users_id')
                ->where('activation_histories.activation_status', 'ACTIVATED')
                ->select('binary_tree_rights.users_id', 'activation_histories.activation_amount');   
        }

        public function getActiveActivations(){
            return $this->hasMany('App\Models\ActivationHistory', 'users_id', 'userID')
                ->where('activation_histories.activation_status', 'ACTIVATED')
                ->select('activation_histories.users_id', 'activation_histories.packages_id', 'activation_histories.packages_name', 'activation_histories.activation_amount');   
        }

        public function getLoginIdByParentId(){
            return $this->hasOne('App\Models\User', 'id', 'parentId')
                ->select('users.id', 'users.login_id');
        }

        public static function listAllLeftMembersById($users_id)
        {
            return BinaryTreeLeft::select('binary_tree_lefts.users_id', 'binary_tree_lefts.child_id', 'users.id as userID', 'users.login_id', 'users.name', 'users.email', 'users.mobile_no', 'users.country', 'users.sponsor_id', 'users.position', 'users.created_at')
                    ->where('binary_tree_lefts.users_id', '=', $users_id)
                    ->join('users', 'binary_tree_lefts.child_id', '=', 'users.id')
                    ->with('getActiveActivations')
                    ->get();
        }

        public static function listAllRightMembersById($users_id)
        {
            return BinaryTreeRight::select('binary_tree_rights.users_id', 'binary_tree_rights.child_id', 'users.id as userID', 'users.login_id', 'users.name', 'users.email', 'users.mobile_no', 'users.country', 'users.sponsor_id', 'users.position', 'users.created_at')
                    ->where('binary_tree_rights.users_id', '=', $users_id)
                    ->join('users', 'binary_tree_rights.child_id', '=', 'users.id')
                    ->with('getActiveActivations')
                    ->get();
        }
}
