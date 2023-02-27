<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FundHistory;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Auth;

class FundController extends Controller
{
    public function listPendingCustomerFunds() {
        $filter = [
            'status' => "PENDING"
        ];
        $data = FundHistory::getAllFundHistory($filter);
        return view('admin.pending-fund-list')->with(["data" => $data]);
    }

    public function confirmCustomerFundSave(Request $request) {
        $filter = [
            "fund_histories_id" =>  $request->fundRequestID
        ];
        $fundHistoryData = FundHistory::getAllFundHistory($filter);

        FundHistory::updateFundHistory($request->fundRequestID, [
            "fund_status" => "CONFIRMED"
        ]);

        // update account wallet
        $walletDetails = User::getWalletDetail(["users_id" => $fundHistoryData->users_id]);
        $latestAccountWalletAmount = $walletDetails->fund_wallet_amount + $fundHistoryData->amount;
        User::updateUser($walletDetails->id, ['fund_wallet_amount' => $latestAccountWalletAmount]);
        
        return redirect()->back()->with('success', 'Fund added successfully.');
    }

    public function declineCustomerFundSave(Request $request) {
        FundHistory::updateFundHistory($request->fundRequestIdDeclined, [
            "fund_status" => "DECLINED"
        ]);
        
        return redirect()->back()->with('success', 'Fund request declined successful.');
    }

    public function listConfirmedFunds() {
        $filter = [
            'status' => "CONFIRMED"
        ];
        $data = FundHistory::getAllFundHistory($filter);
        return view('admin.confirmed-fund-list')->with(["data" => $data]);
    }

    public function listDeclinedFunds() {
        $filter = [
            'status' => "DECLINED"
        ];
        $data = FundHistory::getAllFundHistory($filter);
        return view('admin.declined-fund-list')->with(["data" => $data]);
    }

    public function listAddFund() {
        return view('admin.add-fund');
    }

    public function addFundSave(Request $request) {
        $request->validate([
            'userId' => ['required'],
            'fundAmount' => ['required','numeric','min:1']
        ]);
        
        $loginIdExist = User::checkExist(['login_id' => $request->userId]);

        if (!$loginIdExist) {
            return back()->withErrors([
                'activationUserId' => 'The provided User ID do not match our records.',
            ]);
        } else {
            $walletDetails = User::getWalletDetail(["login_id" =>$request->userId]);
            $orderId = uniqid("km_", TRUE);
            FundHistory::addFundHistory([
                'users_id' => $walletDetails->id,
                'order_id' => $orderId,
                'amount' => $request->fundAmount,
                'fund_status' => "CONFIRMED",
                'created_by' => Auth::user()->id
            ]);

            DB::table('coinpayment_transactions')->insert([
                'uuid' => uniqid("uuid_", TRUE),
                'order_id' => $orderId,
                'buyer_name' => $walletDetails->name,
                'buyer_email' => $walletDetails->email,
                'currency_code' => 'USD',
                'amount_total_fiat' => $request->fundAmount,
                'status' => 100,
                'status_text' => 'Complete',
                'type' => 'admin',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            
            $lastInsertId = DB::getPdo()->lastInsertId();
            DB::table('coinpayment_transaction_items')->insert([
                'coinpayment_transaction_id' => $lastInsertId,
                'description' => "Krypto Musk - paid by admin",
                'price' => $request->fundAmount,
                'qty' => 1,
                'subtotal' => $request->fundAmount,
                'currency_code' => 'USD',
                'type' => 'admin',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            
            $latestAccountWalletAmount = $walletDetails->fund_wallet_amount + $request->fundAmount;
            User::updateUser($walletDetails->id, ['fund_wallet_amount' => $latestAccountWalletAmount]);

            return redirect()->back()->with('success', 'Fund added successfully.');
        }
    }

    public function listAddFundReport() {
        $filter = [
            'status' => "CONFIRMED",
            'created_by' => true
        ];
        $data = FundHistory::getAdminAllFundHistory($filter);
        return view('admin.add-fund-report')->with(["data" => $data]);
    }

    public function listRemoveFund() {
        return view('admin.remove-fund');
    }

    public function removeFundSave(Request $request) {
        $request->validate([
            'userId' => ['required'],
            'fundAmount' => ['required','numeric','min:1']
        ]);
        
        $loginIdExist = User::checkExist(['login_id' => $request->userId]);

        if (!$loginIdExist) {
            return back()->withErrors([
                'activationUserId' => 'The provided User ID do not match our records.',
            ]);
        } else {
            $walletDetails = User::getWalletDetail(["login_id" =>$request->userId]);
            FundHistory::addFundHistory([
                'users_id' => $walletDetails->id,
                'amount' => $request->fundAmount,
                'fund_status' => "REMOVED",
                'created_by' => Auth::user()->id
            ]);

            if ($walletDetails->fund_wallet_amount < $request->fundAmount) {
                $latestAccountWalletAmount = 0;
            } else {
                $latestAccountWalletAmount = $walletDetails->fund_wallet_amount - $request->fundAmount;
            }
            User::updateUser($walletDetails->id, ['fund_wallet_amount' => $latestAccountWalletAmount]);

            return redirect()->back()->with('success', 'Fund removed successfully.');
        }
    }

    public function listRemoveFundReport() {
        $filter = [
            'status' => "REMOVED",
            'created_by' => Auth::user()->id
        ];
        $data = FundHistory::getAdminAllFundHistory($filter);
        return view('admin.remove-fund-report')->with(["data" => $data]);
    }
}
