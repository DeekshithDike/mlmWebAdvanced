<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ActivationHistory;
use App\Models\DirectIncome;
use App\Models\User;
use App\Models\Packages;
use App\Models\BinaryTree;
use Auth;

class AccountActivationController extends Controller
{
    public function listPendingActivations() {
        $filter = [
            'activation_status' => "PENDING"
        ];
        $data = ActivationHistory::viewActivationHistory($filter);
        return view('admin.pending-activation-list')->with(['data' => $data]);
    }

    public function activateAccountSave(Request $request) {
        $filter = [
            "activationId" =>  $request->activationID
        ];
        $activationData = ActivationHistory::viewActivationHistory($filter);

        // expiry date calculation
        $startDate = date('Y-m-d'); $noOfDaysToAdd = $activationData->packages_duration; $count = 0;
        $expiryDate = self::getExpiryDate($startDate, $noOfDaysToAdd, $count);

        ActivationHistory::updateActivationHistory($request->activationID, [
            "expiry_date" => $expiryDate,
            "activated_on" => date('Y-m-d h:m:s'),
            "activation_status" => "ACTIVATED"
        ]);

        // update account wallet
        $walletDetail = User::getWalletDetail(["users_id" => $activationData->users_id]);
        $latestFund = $walletDetail->fund_wallet_amount - $activationData->activation_amount;
        User::updateUser($activationData->users_id, ['fund_wallet_amount' => $latestFund]);

        // update direct income
        $userDet = User::getUsersDetails(["id" => $activationData->users_id]);
        $sponsorWalletDet = User::getWalletDetail(["login_id" => $userDet->sponsor_id]);
        $directIncome = ($activationData->activation_amount * $activationData->packages_referral) / 100;
        
        DirectIncome::addDirectIncome([
            "users_id" => $sponsorWalletDet->id,
            "referred" => $userDet->login_id,
            "amount" => $directIncome,
            "status" => "PAID",
        ]);
        $latestWorkingWalletAmount = $sponsorWalletDet->working_wallet_amount + $directIncome;
        User::updateUser($sponsorWalletDet->id, ['working_wallet_amount' => $latestWorkingWalletAmount]);
        
        return redirect()->back()->with('success', 'Activation successful.');
    }

    public function declineAccountSave(Request $request) {
        ActivationHistory::updateActivationHistory($request->activationIdDeclined, [
            "activation_status" => "DECLINED"
        ]);
        
        return redirect()->back()->with('success', 'Activation declined successful.');
    }

    public static function getExpiryDate($_startDate, $noOfDaysToAdd, $count){
        if($count < $noOfDaysToAdd){
            $_startDate = date('Y-m-d', strtotime($_startDate. ' + 1 days'));
            $dayOfWeek = date("N", strtotime($_startDate));
            
            // if($dayOfWeek != 6 && $dayOfWeek != 7){
              $count++;
            // }
            return self::getExpiryDate($_startDate, $noOfDaysToAdd, $count);
        }
        return $_startDate;
    }

    public function listActivatedAccounts() {
        $filter = [
            'activation_status' => "ACTIVATED"
        ];
        $data = ActivationHistory::viewActivationHistory($filter);
        return view('admin.activated-accounts-list')->with(['data' => $data]);
    }

    public function listDeclinedActivations() {
        $filter = [
            'activation_status' => "DECLINED"
        ];
        $data = ActivationHistory::viewActivationHistory($filter);
        return view('admin.declined-accounts-list')->with(['data' => $data]);
    }

    public function listAddTopup() {
        $packages = Packages::viewPackages();
        return view('admin.add-topup')->with(["packages" => $packages]);
    }

    public function addTopupSave(Request $request) {
        $request->validate([
            'activationUserId' => ['required'],
            'package' => ['required'],
            'activationAmount' => ['required','numeric','min:1']
        ]);

        $userId = Auth::user()->id;
        $loginIdExist = User::checkExist(['login_id' => $request->activationUserId]);
        $packageIdExist = Packages::checkExist(['id' => $request->package]);

        if (!$loginIdExist) {
            return back()->withErrors([
                'activationUserId' => 'The provided User ID do not match our records.',
            ]);
        } else if (!$packageIdExist) {
            return back()->withErrors([
                'activationUserId' => 'The selected package do not match our records.',
            ]);
        } else if (($request->activationAmount < $packageIdExist->min_amount) || ($request->activationAmount > $packageIdExist->max_amount)) {
            return back()->withErrors([
                'activationUserId' => 'Activation amount not within selected package.',
            ]);
        }else {
            // expiry date calculation
            $startDate = date('Y-m-d'); $noOfDaysToAdd = $packageIdExist->duration; $count = 0;
            $expiryDate = self::getExpiryDate($startDate, $noOfDaysToAdd, $count);
            
            $activationUserWalletDet = User::getWalletDetail(['login_id' => $request->activationUserId]);

            ActivationHistory::addActivationHistory([
                "users_id" => $activationUserWalletDet->id,
                "login_id" => $request->activationUserId,
                "packages_id" => $request->package,
                "activation_amount" => $request->activationAmount,
                "packages_name" => $packageIdExist->name,
                "packages_min_amount" => $packageIdExist->min_amount,
                "packages_max_amount" => $packageIdExist->max_amount,
                "packages_roi" => $packageIdExist->roi,
                "packages_referral" => $packageIdExist->referral,
                "packages_binary" => $packageIdExist->binary,
                "packages_capping" => $packageIdExist->capping,
                "packages_duration" => $packageIdExist->duration,
                "activation_by" => "ADMIN",
                "expiry_date" => $expiryDate,
                "activated_on" => date('Y-m-d h:m:s'),
                "activation_status" => "ACTIVATED",
                "created_by" => $userId
            ]);

            // update direct income
            $referralPercentage = ActivationHistory::activeTopOnePackage([
                "login_id" => $activationUserWalletDet->sponsor_id
            ]);

            if ($referralPercentage) {
                $sponsorWalletDet = User::getWalletDetail(["login_id" => $activationUserWalletDet->sponsor_id]);
                $directIncome = ($request->activationAmount * $referralPercentage) / 100;
                
                DirectIncome::addDirectIncome([
                    "users_id" => $sponsorWalletDet->id,
                    "referred" => $request->activationUserId,
                    "amount" => $directIncome,
                    "status" => "PAID",
                ]);
                $latestWorkingWalletAmount = $sponsorWalletDet->working_wallet_amount + $directIncome;
                User::updateUser($sponsorWalletDet->id, ['working_wallet_amount' => $latestWorkingWalletAmount]);
            }

            $binaryTree = BinaryTree::checkExist(["users_id" => $activationUserWalletDet->id]);            
            
            if ($binaryTree->parent_id != 0) {
                $sendPayload = [
                    'parent_id' => $binaryTree->parent_id,
                    'child_position' => $activationUserWalletDet->position,
                    'activation_amount' => $request->activationAmount,
                    'today' => date('Y-m-d H:i:s'),
                    'todayDateOnly' => date('Y-m-d')
                ];
                
                // call API to add binary income to users
                $client = new \GuzzleHttp\Client();
                $url = config('services.nodeapi.endpoint')."/api/v1/user/update/binary";
                $promise = $client->postAsync($url, ['json' => $sendPayload], ['Content-Type' => 'application/json']);
                $promise->wait();
            }            

            return redirect()->back()->with('success', 'Topup successful.');
        }
    }

    public function listAddTopupReport() {
        $filter = [
            'activation_by' => "ADMIN"
        ];
        $data = ActivationHistory::viewActivationHistory($filter);
        return view('admin.activated-accounts-list')->with(['data' => $data]);
    }
}
