<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WithdrawalHistory;
use App\Models\User;
use Auth;

class WithdrawalController extends Controller
{
    public function withdrawWorkingProfit() {
        return view('customer.withdraw-working-profit');
    }

    public function withdrawWorkingProfitSave(Request $request) {
        $request->validate([
            'withdrawAmount' => ['required','numeric','min:10']
        ]);

        $userId = Auth::user()->id;

        if ($request->withdrawAmount > Auth::user()->working_wallet_amount) {
            return back()->withErrors([
                'activationUserId' => "You don't have sufficient balance in working wallet to withdraw.",
            ]);
        } else {
            WithdrawalHistory::addWithdrawalHistory([
                'users_id' => $userId,
                'withdrawal_amount' => $request->withdrawAmount,
                'deduction' => config('services.withdrawalcharges.working'),    //in percentage
                'withdraw_from' => "WORKING_WALLET",
                'withdrawal_status' => "PENDING"
            ]);

            $latestWorkingWalletFund = Auth::user()->working_wallet_amount - $request->withdrawAmount;
            User::updateUser($userId, ['working_wallet_amount' => $latestWorkingWalletFund]);

            return redirect()->back()->with('success', 'Withdrawal request sent successfully.');
        }
    }

    public function withdrawRoiProfit() {
        return view('customer.withdraw-roi-profit');
    }

    public function withdrawRoiProfitSave(Request $request) {
        $request->validate([
            'withdrawAmount' => ['required','numeric','min:10']
        ]);

        $userId = Auth::user()->id;

        if ($request->withdrawAmount > Auth::user()->roi_wallet_amount) {
            return back()->withErrors([
                'activationUserId' => "You don't have sufficient balance in roi wallet to withdraw.",
            ]);
        } else {
            WithdrawalHistory::addWithdrawalHistory([
                'users_id' => $userId,
                'withdrawal_amount' => $request->withdrawAmount,
                'deduction' => config('services.withdrawalcharges.roi'),    //in percentage
                'withdraw_from' => "ROI_WALLET",
                'withdrawal_status' => "PENDING"
            ]);

            $latestROIWalletFund = Auth::user()->roi_wallet_amount - $request->withdrawAmount;
            User::updateUser($userId, ['roi_wallet_amount' => $latestROIWalletFund]);

            return redirect()->back()->with('success', 'Withdrawal request sent successfully.');
        }
    }

    public function workingProfitReport() {
        $filter = [
            "withdrawalFrom" => "WORKING_WALLET"
        ];
        $data = WithdrawalHistory::viewWithdrawalHistory($filter);
        return view('customer.working-wallet-withdrawal-report')->with(["data" => $data]);
    }

    public function roiProfitReport() {
        $filter = [
            "withdrawalFrom" => "ROI_WALLET"
        ];
        $data = WithdrawalHistory::viewWithdrawalHistory($filter);
        return view('customer.roi-wallet-withdrawal-report')->with(["data" => $data]);
    }
}
