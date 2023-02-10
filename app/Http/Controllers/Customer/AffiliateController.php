<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BinaryTree;
use App\Models\BinaryTreeLeft;
use App\Models\BinaryTreeRight;
use App\Models\User;
use Auth;
use Crypt;

class AffiliateController extends Controller
{
    public function viewMemberTree() {
        $users_id = Auth::user()->id;
        $userDet = BinaryTree::getMyBinaryTreeDet($users_id);
        $results = self::getChildData($userDet);
        // dd($results);

        return view('customer.member-tree')->with(['data' => $results]);
    }

    public function viewIndividualMemberTree($id) {
        $users_id = Crypt::decrypt($id);
        $userDet = BinaryTree::getMyBinaryTreeDet($users_id);
        $results = self::getChildData($userDet);

        return view('customer.member-tree')->with(['data' => $results]);
    }

    public function viewDirectMembers() {
        $login_id = Auth::user()->login_id;
        $data = User::listDirectMembersById($login_id);
        // dd($data);
        return view('customer.my-direct-members')->with(["data" => $data]);
    }

    public function viewAllMembers() {
        $users_id = Auth::user()->id;
        $dataLeft = BinaryTree::listAllLeftMembersById($users_id);
        $dataRight = BinaryTree::listAllRightMembersById($users_id);
        // dd($data);
        return view('customer.all-my-members')->with(["dataLeft" => $dataLeft, "dataRight" => $dataRight]);
    }

    public static function getChildData($userDet) {

        $firstLeftChild = BinaryTree::getChild($userDet['users_id'], 'left');
        $firstLeftRight = BinaryTree::getChild($userDet['users_id'], 'right');
        
        if ($firstLeftChild) {
            $secondLeftChild = BinaryTree::getChild($firstLeftChild['users_id'], 'left');
            $secondLeftRight = BinaryTree::getChild($firstLeftChild['users_id'], 'right');
        } else {
            $secondLeftChild = null;
            $secondLeftRight = null;
        }

        if ($firstLeftRight) {
            $thirdLeftChild = BinaryTree::getChild($firstLeftRight['users_id'], 'left');
            $thirdLeftRight = BinaryTree::getChild($firstLeftRight['users_id'], 'right');
        } else {
            $thirdLeftChild = null;
            $thirdLeftRight = null;
        }

        return [
            'parent_det' => $userDet,
            'left_child_1' => $firstLeftChild,
            'right_child_1' => $firstLeftRight,
            'left_child_2' => $secondLeftChild,
            'right_child_2' => $secondLeftRight,
            'left_child_3' => $thirdLeftChild,
            'right_child_3' => $thirdLeftRight
        ];
    }
}
