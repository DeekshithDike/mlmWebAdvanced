<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use App\Models\BinaryIncome;
use App\Models\BinaryTreeLeft;
use App\Models\BinaryTreeRight;
use App\Models\RoiIncome;
use App\Models\DirectIncome;
use App\Models\ActivationHistory;
use App\Models\User;
use Auth;

class DashboardController extends Controller
{
    public function viewDashboard() {
        $userId = Auth::user()->id;
        
        $totalLeftBusiness = BinaryTreeLeft::dashboardViewLeftBusiness([
            "users_id" => $userId
        ]);
        $totalRightBusiness = BinaryTreeRight::dashboardViewRightBusiness([
            "users_id" => $userId
        ]);
        $totalLeftUserCount = BinaryTreeLeft::dashboardViewTotalLeftCount([
            "users_id" => $userId
        ]);
        $totalRightUserCount = BinaryTreeRight::dashboardViewTotalRightCount([
            "users_id" => $userId
        ]);
        $activeLeftUserCount = BinaryTreeLeft::dashboardViewActiveLeftCount([
            "users_id" => $userId,
            "count" => true,
            "activation_status" => "ACTIVATED"
        ]);
        $activeRightUserCount = BinaryTreeRight::dashboardViewActiveRightCount([
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
        $totalInvestment = ActivationHistory::totalInvestment(["users_id" => $userId]);

        return view('customer.dashboard')->with([
            'totalLeftUserCount' => $totalLeftUserCount,
            'totalRightUserCount' => $totalRightUserCount,
            'activeLeftUserCount' => $activeLeftUserCount,
            'activeRightUserCount' => $activeRightUserCount,
            "totalLeftBusiness" => $totalLeftBusiness,
            "totalRightBusiness" => $totalRightBusiness,
            "totalBinaryIncome" => $totalBinaryIncome,
            "totalRoiIncome" => $totalRoiIncome,
            "totalDirectIncome" => $totalDirectIncome,
            "totalInvestment" => $totalInvestment
        ]);
    }

    public function viewCustomerProfile() {
        return view('customer.customer-profile');
    }

    public function storeCustomerProfilePhoto(Request $request) {
        $request->validate([
            'profileFile'=>'nullable|mimes:jpeg,jpg,png,|max:3000',
        ]);

        try {
            $file_path = null;
            $oldFileName = Auth::user()->profile_path;
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

            User::updateUser(Auth::user()->id, ["profile_path" => $filename]);
            return redirect()->back();
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return back()->withErrors([
                'error' => 'Server Error: '.$th->getMessage(),
            ]);
        }

        
    }

    public function changePassword(Request $request) {
        if ($request->isMethod('post')) {
            if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
                // The passwords matches
                return back()->withErrors([
                    'current-password' => 'Your current password does not matches with the password you provided. Please try again.',
                ]);
            }
    
            if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
                //Current password and new password are same
                return back()->withErrors([
                    'new-password' => 'New Password cannot be same as your current password. Please choose a different password.',
                ]);
            }
    
            $request->validate([
                'current-password' => 'required',
                'new-password' => ['required', 'confirmed', Rules\Password::defaults()]
            ]);
    
            //Change Password
            $user = Auth::user();
            $user->password = bcrypt($request->get('new-password'));
            $user->save();
    
            return redirect()->back()->with('success', 'Password changed successfully.');
        }
        return view('customer.customer-change-password');
    }

    public function btcAddress(Request $request) {
        if ($request->isMethod('post')) {
            $request->validate([
                'walletAddress' => ['required']
            ]);

            $userId = Auth::user()->id;
            User::updateUser($userId, ['wallet_address' => $request->walletAddress]);
    
            return redirect()->back()->with('success', 'BTC address submitted successfully.');
        }
        return view('customer.customer-wallet-address');
    }
}
