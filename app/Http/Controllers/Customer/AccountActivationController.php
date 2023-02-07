<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Packages;
use App\Models\User;
use App\Models\CoinbaseCharges;
use App\Models\ActivationHistory;
use App\Models\DirectIncome;
use App\Models\BinaryTree;
use Auth;

class AccountActivationController extends Controller
{
    public function activateAccount() {
        $packages = Packages::viewPackages();
        return view('customer.activate-account')->with(["packages" => $packages]);
    }

    public function activateAccountSave(Request $request) {
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
        } else if ($request->activationAmount > Auth::user()->fund_wallet_amount) {
            return back()->withErrors([
                'activationUserId' => "You don't have sufficient fund to activate account, add fund before proceed.",
            ]);
        } else if (!$packageIdExist) {
            return back()->withErrors([
                'activationUserId' => 'The selected package do not match our records.',
            ]);
        } else if (($request->activationAmount < $packageIdExist->min_amount) || ($request->activationAmount > $packageIdExist->max_amount)) {
            return back()->withErrors([
                'activationUserId' => 'Activation amount not within selected package.',
            ]);
        } else {
            $activationUserWalletDet = User::getWalletDetail(['login_id' => $request->activationUserId]);

            // expiry date calculation
            $startDate = date('Y-m-d'); $noOfDaysToAdd = $packageIdExist->duration; $count = 0;
            $expiryDate = self::getExpiryDate($startDate, $noOfDaysToAdd, $count);

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
                "expiry_date" => $expiryDate,
                "activated_on" => date('Y-m-d h:m:s'),
                "activation_status" => "ACTIVATED",
                "created_by" => $userId
            ]);

            // update user account wallet
            $latestAccountWalletFund = Auth::user()->fund_wallet_amount - $request->activationAmount;
            User::updateUser($userId, ['fund_wallet_amount' => $latestAccountWalletFund]);

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

            return redirect()->back()->with('success', 'Activation successful.');
        }
    }

    public function myActivations() {
        $filter = [
            'isAffiliate' => false,
            'login_id' => Auth::user()->login_id
        ];
        $data = ActivationHistory::viewActivationHistory($filter);
        return view('customer.my-activation-list')->with(['data' => $data]);
    }

    public function affiliateActivations() {
        $filter = [
            'isAffiliate' => true,
            'login_id' => Auth::user()->login_id,
            'users_id' => Auth::user()->id,
        ];
        $data = ActivationHistory::viewActivationHistory($filter);
        return view('customer.affiliate-activation-list')->with(['data' => $data]);
    }

    public static function createCharge($chargeData) {
        $response = CoinbaseCharges::createCharge([
            "name" => config('app.name', 'MLM'),
            "description" => config('app.name', 'MLM')." Platform requesting you to pay USD ".$chargeData['actualAmount'],
            "local_price" => [
                "amount" => $chargeData['actualAmount'],
                "currency" => "USD"
            ],
            "pricing_type" => "fixed_price",
            "metadata" => $chargeData,
            "redirect_url" => $chargeData['redirect_url'],
            "cancel_url" => $chargeData['cancel_url']
        ]);
        
        return ['id' => $response->data->id, 'code' => $response->data->code, 'hosted_url' => $response->data->hosted_url];
    }

    public static function getExpiryDate($_startDate, $noOfDaysToAdd, $count){
        if($count < $noOfDaysToAdd){
            $_startDate = date('Y-m-d', strtotime($_startDate. ' + 1 days'));
            $dayOfWeek = date("N", strtotime($_startDate));
            
            if($dayOfWeek != 6 && $dayOfWeek != 7){
              $count++;
            }
            return self::getExpiryDate($_startDate, $noOfDaysToAdd, $count);
        }
        return $_startDate;
    }
}
