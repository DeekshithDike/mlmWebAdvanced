<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\WithdrawalHistory;
use App\Models\User;

class WithdrawalController extends Controller
{
    public function listPendingWithdrawal() {
        $filter = [
            "withdrawalStatus" => "PENDING"
        ];
        $data = WithdrawalHistory::viewWithdrawalHistory($filter);
        return view('admin.pending-withdrawal')->with(["data" => $data]);
    }

    public function confirmWithdrawalSave(Request $request) {
        WithdrawalHistory::updateWithdrawalHistory($request->withdrawalRequestId, [
            "withdrawal_status" => "CONFIRMED"
        ]);

        $WithdrawalHistory = WithdrawalHistory::viewWithdrawalHistory(["withdrawal_histories_id" => $request->withdrawalRequestId]);
        $mailData = array('name' => $WithdrawalHistory->name, 'userId' => $WithdrawalHistory->login_id, 'email' => $WithdrawalHistory->email, 'amount' => $WithdrawalHistory->withdrawal_amount);

        Mail::send('mail.withdrawal-successful', $mailData, function ($message) use ($mailData) {
            $message->to($mailData['email'], $mailData['name'])->subject('Withdrawal Successful');
            $message->from(config('mail.from.address'), config('mail.from.name'));
        });
        
        return redirect()->back()->with('success', 'Withdrawal confirmed successfully.');
    }

    public function declineWithdrawalSave(Request $request) {
        WithdrawalHistory::updateWithdrawalHistory($request->withdrawalRequestIdDeclined, [
            "withdrawal_status" => "DECLINED"
        ]);
        
        return redirect()->back()->with('success', 'Withdrawal declined successfully.');
    }
    
    public function listConfirmedWithdrawal() {
        $filter = [
            "withdrawalStatus" => "CONFIRMED"
        ];
        $data = WithdrawalHistory::viewWithdrawalHistory($filter);
        return view('admin.confirmed-withdrawal')->with(["data" => $data]);
    }

    public function listDeclinedWithdrawal() {
        $filter = [
            "withdrawalStatus" => "DECLINED"
        ];
        $data = WithdrawalHistory::viewWithdrawalHistory($filter);
        return view('admin.declined-withdrawal')->with(["data" => $data]);
    }
}
