<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransferHistory;
use App\Models\User;
use App\Models\BinaryTreeLeft;
use App\Models\BinaryTreeRight;
use Auth;

class TransferController extends Controller
{
    public function kmToKmTransfer() {
        return view('customer.km-to-km-transfer');
    }

    public function kmToKmTransferSave(Request $request) {
        $request->validate([
            'transferUserId' => ['required'],
            'transferAmount' => ['required','numeric','min:1']
        ]);

        $userId = Auth::user()->id;
        $loginIdExist = User::checkExist(['login_id' => $request->transferUserId]);
        

        if (!$loginIdExist) {
            return back()->withErrors([
                'transferUserId' => 'The provided User ID do not match our records.',
            ]);
        } else if (Auth::user()->login_id == $request->transferUserId) {
            return back()->withErrors([
                'transferUserId' => "You cannot transfer fund to your own account wallet.",
            ]);
        } else if ($request->transferAmount > Auth::user()->fund_wallet_amount) {
            return back()->withErrors([
                'transferAmount' => "You don't have sufficient fund to transfer in your account wallet.",
            ]);
        } else {
            $walletDetailsByLoginId = User::getWalletDetail(["login_id" => $request->transferUserId]);
            $isLeftDownLine = BinaryTreeLeft::where(['users_id' => $userId, 'child_id' => $walletDetailsByLoginId->id])->exists();
            if (!$isLeftDownLine) {
                return back()->withErrors([
                    'transferUserId' => "The provided User ID not your downline user.",
                ]);
            } else {
                TransferHistory::addTransferHistory([
                    "users_id" => $userId,
                    "transfer_type" => "KM_TO_KM",
                    "transferred_amount" => $request->transferAmount,
                    "transferred_to" => $request->transferUserId
                ]);
                
                $latestMinusFund = Auth::user()->fund_wallet_amount - $request->transferAmount;
                User::updateUser($userId, ['fund_wallet_amount' => $latestMinusFund]);
                
                $latestAddFund = $walletDetailsByLoginId->fund_wallet_amount + $request->transferAmount;
                User::updateUser($walletDetailsByLoginId->id, ['fund_wallet_amount' => $latestAddFund]);

                return redirect()->back()->with('success', 'Transfer successful.');
            }
        }
    }

    public function roiToKmTransfer() {
        return view('customer.roi-to-km-transfer');
    }

    public function roiToKmTransferSave(Request $request) {
        $request->validate([
            'transferAmount' => ['required','numeric','min:1']
        ]);

        $userId = Auth::user()->id;

        if ($request->transferAmount > Auth::user()->roi_wallet_amount) {
            return back()->withErrors([
                'transferAmount' => "You don't have sufficient fund to transfer in roi wallet.",
            ]);
        } else {
            TransferHistory::addTransferHistory([
                "users_id" => $userId,
                "transfer_type" => "ROI_TO_KM",
                "transferred_amount" => $request->transferAmount
            ]);

            $latestMinusFund = Auth::user()->roi_wallet_amount - $request->transferAmount;
            User::updateUser($userId, ['roi_wallet_amount' => $latestMinusFund]);

            $latestAddFund = Auth::user()->fund_wallet_amount + $request->transferAmount;
            User::updateUser($userId, ['fund_wallet_amount' => $latestAddFund]);

            return redirect()->back()->with('success', 'Transfer successful.');
        }
    }

    public function workingToKmTransfer() {
        return view('customer.working-to-km-transfer');
    }

    public function workingToKmTransferSave(Request $request) {
        $request->validate([
            'transferAmount' => ['required','numeric','min:1']
        ]);

        $userId = Auth::user()->id;

        if ($request->transferAmount > Auth::user()->working_wallet_amount) {
            return back()->withErrors([
                'transferAmount' => "You don't have sufficient fund to transfer in working wallet.",
            ]);
        } else {
            TransferHistory::addTransferHistory([
                "users_id" => $userId,
                "transfer_type" => "WORKING_TO_KM",
                "transferred_amount" => $request->transferAmount
            ]);

            $latestMinusFund = Auth::user()->working_wallet_amount - $request->transferAmount;
            User::updateUser($userId, ['working_wallet_amount' => $latestMinusFund]);

            $latestAddFund = Auth::user()->fund_wallet_amount + $request->transferAmount;
            User::updateUser($userId, ['fund_wallet_amount' => $latestAddFund]);

            return redirect()->back()->with('success', 'Transfer successful.');
        }
    }

    public function transferReport() {
        $userId = Auth::user()->id;
        $data = TransferHistory::viewTransferHistory(["users_id" => $userId]);
        return view('customer.transfer-report')->with(['data' => $data]);
    }
}
