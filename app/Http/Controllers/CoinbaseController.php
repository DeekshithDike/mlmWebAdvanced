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
