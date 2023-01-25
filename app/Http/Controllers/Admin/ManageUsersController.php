<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BinaryTree;
use App\Models\BinaryTreeLeft;
use App\Models\BinaryTreeRight;
use App\Models\RoiIncome;
use App\Models\DirectIncome;
use App\Models\BinaryIncome;
use Crypt;
use Auth;


class ManageUsersController extends Controller
{
    public function listDownlineUsers() {
        $filter = [
            'login_status' => 1,
            'user_role' => "USER"
        ];

        $data = User::listAllUsers($filter);
        return view('admin.downline-users')->with(['data' => $data]);
    }

    public function listBlockedUsers() {
        $filter = [
            'login_status' => 0,
            'user_role' => "USER"
        ];

        $data = User::listAllUsers($filter);
        return view('admin.blocked-users')->with(['data' => $data]);
    }

    public function listUsersTree() {
        $users_id = 1;
        $userDet = BinaryTree::getMyBinaryTreeDet($users_id);
        $results = self::getChildData($userDet);

        return view('admin.member-tree')->with(['data' => $results]);
    }

    public function listIndividualUsersTree($id) {
        $users_id = Crypt::decrypt($id);

        $userIdExist = User::checkExist(['id' => $users_id]);
        if (!$userIdExist) {
            return back()->withErrors([
                'activationUserId' => 'The provided Login ID do not match our records.',
            ]);
        } else {
            $userDet = BinaryTree::getMyBinaryTreeDet($users_id);
            $results = self::getChildData($userDet);

            return view('admin.member-tree')->with(['data' => $results]);
        }
    }

    public function searchIndividualUsersTree(Request $request) {
        $request->validate([
            'loginID' => ['required']
        ]);
        $loginIdExist = User::checkExist(['login_id' => $request->loginID]);

        if (!$loginIdExist) {
            return back()->withErrors([
                'activationUserId' => 'The provided User ID do not match our records.',
            ]);
        } else {
            $userWalletDet = User::getWalletDetail(['login_id' => $request->loginID]);
            $userDet = BinaryTree::getMyBinaryTreeDet($userWalletDet->id);
            $results = self::getChildData($userDet);

            return view('admin.member-tree')->with(['data' => $results]);
        }
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

    public function blockUser(Request $request) {
        $request->validate([
            'downlineBlocUserID' => ['required']
        ]);
        User::updateUser($request->downlineBlocUserID, ['login_status' => 0]);
        
        return redirect()->back()->with('success', 'User Blocked successfully.');
    }

    public function unBlockUser(Request $request) {
        $request->validate([
            'downlineUnBlockUserID' => ['required']
        ]);
        User::updateUser($request->downlineUnBlockUserID, ['login_status' => 1]);
        
        return redirect()->back()->with('success', 'User Unblocked successfully.');
    }

    public function viewEditUserProfile($id) {
        $users_id = Crypt::decrypt($id);
        $data = User::getUsersDetails(['id' => $users_id]);
        return view('admin.customer-profile')->with(['data' => $data]);
    }

    public function storeCustomerProfilePhoto(Request $request) {
        $request->validate([
            'profileFile'=>'nullable|mimes:jpeg,jpg,png,|max:3000',
        ]);

        try {
            $file_path = null;
            $userData = User::getUsersDetails($request->editUserID);
            $oldFileName = $userData->profile_path;
            if ($request->hasFile('profileFile')) {
                $file = $request->file('profileFile');
                if ($file->isValid()) {
                    $extension = $file->getClientOriginalExtension();
                    $filename = rand(10000,99999) . date("YmdHis") . '.' . $extension;
                    $destinationPath = "storage/profile/";
                    $file->move($destinationPath, $filename);
                    
                    // $file_path = URL::to('') . "/" . $destinationPath . "" . $filename;
                    $file_path = $destinationPath . "" . $filename;

                    if ($file_path != null && $oldFileName != null) {
                        unlink(storage_path('app/public/profile/'.$oldFileName));
                    }
                }
            }

            User::updateUser($userData->id, ["profile_path" => $filename]);
            return redirect()->back();
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return back()->withErrors([
                'error' => 'Server Error: '.$th->getMessage(),
            ]);
        }        
    }

    public function viewCustomerChangePassword($id) {
        $users_id = Crypt::decrypt($id);
        $data = User::getUsersDetails(['id' => $users_id]);
        return view('admin.customer-change-password')->with(['data' => $data]);
    }

    public function adminCustomerChangePasswordSave(Request $request) {
        $request->validate([
            'new-password' => ['required', 'confirmed', Rules\Password::defaults()],
            'editUserID' => ['required']
        ]);

        //Change Password
        $newPassword = bcrypt($request->get('new-password'));
        User::updateUser($request->editUserID, ["password" => $newPassword]);

        return redirect()->back()->with('success', 'Password changed successfully.');
    }

    public function viewCustomerWalletAddress($id) {
        $users_id = Crypt::decrypt($id);
        $data = User::getUsersDetails(['id' => $users_id]);
        return view('admin.customer-wallet-address')->with(['data' => $data]);
    }

    public function viewCustomerWalletAddressSave(Request $request) {
        $request->validate([
            'walletAddress' => ['required'],
            'editUserID' => ['required']
        ]);

        User::updateUser($request->editUserID, ["wallet_address" => $request->walletAddress]);

        return redirect()->back()->with('success', 'BTC address changed successfully.');
    }
    
    public function viewCustomerDashboard($id) {
        $userId = Crypt::decrypt($id);
        
        $totalLeftBusiness = BinaryTreeLeft::viewLeftBusinessAndCount([
            "users_id" => $userId,
            "sum" => true
        ]);
        $totalRightBusiness = BinaryTreeRight::viewRightBusinessAndCount([
            "users_id" => $userId,
            "sum" => true,
        ]);
        $totalLeftUserCount = BinaryTreeLeft::viewLeftBusinessAndCount([
            "users_id" => $userId,
            "count" => true
        ]);
        $totalRightUserCount = BinaryTreeRight::viewRightBusinessAndCount([
            "users_id" => $userId,
            "count" => true
        ]);
        $activeLeftUserCount = BinaryTreeLeft::viewLeftBusinessAndCount([
            "users_id" => $userId,
            "count" => true,
            "activation_status" => "ACTIVATED"
        ]);
        $activeRightUserCount = BinaryTreeRight::viewRightBusinessAndCount([
            "users_id" => $userId,
            "count" => true,
            "activation_status" => "ACTIVATED"
        ]);
        
        $totalRoiIncome = RoiIncome::getRoiIncomeSum([
            "users_id" => $userId
        ]);
        $totalDirectIncome = DirectIncome::getDirectIncomeSum([
            "users_id" => $userId
        ]);
        $totalBinaryIncome = BinaryIncome::getBinaryIncomeSum([
            "users_id" => $userId
        ]);

        $userDet = User::getUsersDetails(["id" => $userId]);
        return view('admin.customer-dashboard')->with([
            'totalLeftUserCount' => $totalLeftUserCount,
            'totalRightUserCount' => $totalRightUserCount,
            'activeLeftUserCount' => $activeLeftUserCount,
            'activeRightUserCount' => $activeRightUserCount,
            "totalLeftBusiness" => $totalLeftBusiness,
            "totalRightBusiness" => $totalRightBusiness,
            "totalBinaryIncome" => $totalBinaryIncome,
            "totalRoiIncome" => $totalRoiIncome,
            "totalDirectIncome" => $totalDirectIncome,
            "login_id" => $userDet->login_id,
            "name" => $userDet->name,
            "last_login_datetime" => $userDet->last_login_datetime,
            "login_ip_address" => $userDet->login_ip_address,
            "fund_wallet_amount" => $userDet->fund_wallet_amount,
            "roi_wallet_amount" => $userDet->roi_wallet_amount,
            "working_wallet_amount" => $userDet->working_wallet_amount,
        ]);
    }
}
