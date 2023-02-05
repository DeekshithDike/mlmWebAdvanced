<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use App\Models\CoinbaseCharges;
use App\Models\FundHistory;
use App\Models\User;

class CoinbaseController extends Controller
{
    public function coinpaymentsStatus(Request $request) {
        $merchant_id = config('coinpayments.marchantid');
        $secret = config('coinpayments.ipnsecret');
        

        if (!isset($_SERVER['HTTP_HMAC']) || empty($_SERVER['HTTP_HMAC'])) {
        die("No HMAC signature sent");
        }

        $merchant = isset($_POST['merchant']) ? $_POST['merchant']:'';
        if (empty($merchant)) {
        die("No Merchant ID passed");
        }

        if ($merchant != $merchant_id) {
        die("Invalid Merchant ID");
        }

        $request = file_get_contents('php://input');
        if ($request === FALSE || empty($request)) {
        die("Error reading POST data");
        }

        $hmac = hash_hmac("sha512", $request, $secret);
        if ($hmac != $_SERVER['HTTP_HMAC']) {
        die("HMAC signature does not match");
        }

        if($request->status >= 100) {
             // update fund history status
            FundHistory::where('order_id', $coinbase_charges_id)->update(["fund_status" => 'confirmed']);

            // update account wallet
            $walletDetails = User::getWalletDetail(["login_id" => $data['event']['data']['metadata']['userId']]);
            $latestAccountWalletAmount = $walletDetails->fund_wallet_amount + $data['event']['data']['metadata']['actualAmount'];
            User::updateUser($walletDetails->id, ['fund_wallet_amount' => $latestAccountWalletAmount]);
            
            return response()->json(['status'=>'success', 'message'=>'Webhook executed successfully.'], 200);
        }
        //process IPN here
    }

    public function chargeConfirmed(Request $request) {
        try {
            $signature = $request->header('x-cc-webhook-signature');
            $payload = $request->getContent();

            $computedSignature = \hash_hmac('sha256', $payload, config('services.coinbase.webhooksecret'));
            $isVerified = \hash_equals($signature, $computedSignature);
            
            if ($isVerified) {
                $data = $request->input();

                if ($data['event']['type'] == "charge:confirmed" || $data['event']['type'] == "charge:resolved") {
                    $checkUserExist = User::checkExist(["login_id" => $data['event']['data']['metadata']['userId']]);

                    if (!$checkUserExist) {
                        return response()->json(['status'=>'error', 'message'=>'User does not exist.'], 500);
                    } else {                        
                        // update coinbase charge status
                        $chargeCode = $data['event']['data']['code'];                        
                        $timelineArr = $data['event']['data']['timeline'];
                        $timelineArrLength = count($timelineArr);
                        $chargeStatus = $timelineArr[$timelineArrLength-1]['status'];
                        CoinbaseCharges::updateUserIdByChargeCode($chargeCode, ['latest_status' => $chargeStatus]);
                        
                        // update fund history status
                        $chargeDet = CoinbaseCharges::getCoinbaseChargesDetails(["charges_code" => $chargeCode]);
                        FundHistory::updateFundHistoryByChargeId($chargeDet->coinbase_charges_id, [
                            "fund_status" => "CONFIRMED"
                        ]);

                        // update account wallet
                        $walletDetails = User::getWalletDetail(["login_id" => $data['event']['data']['metadata']['userId']]);
                        $latestAccountWalletAmount = $walletDetails->fund_wallet_amount + $data['event']['data']['metadata']['actualAmount'];
                        User::updateUser($walletDetails->id, ['fund_wallet_amount' => $latestAccountWalletAmount]);
                        
                        return response()->json(['status'=>'success', 'message'=>'Webhook executed successfully.'], 200);
                    }
                } else {
                    return response()->json(['status'=>'error', 'message'=>'Invalid Payload'], 500);
                }
            } else {
                return response()->json(['signature'=>'Invalid Signature'], 500);
            }
        } catch (\Throwable $th) {
            return response()->json(['status'=>'error', 'error'=>$th->getMessage()], 500);
        }        
    }
}
