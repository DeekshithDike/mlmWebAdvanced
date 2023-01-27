<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\WithdrawalHistory;
use App\Models\User;
use Auth;
use Crypt;

class WithdrawalController extends Controller
{
    public function withdrawWorkingProfit() {
        return view('customer.withdraw-working-profit');
    }

    public function withdrawWorkingReqSendOTP(Request $request) {
        $request->validate([
            'withdrawAmount' => ['required','numeric','min:10']
        ]);

        $userId = Auth::user()->id;

        if ($request->withdrawAmount > Auth::user()->working_wallet_amount) {
            return back()->withErrors([
                'activationUserId' => "You don't have sufficient balance in working wallet to withdraw.",
            ]);
        } else {
            $random = str_shuffle('1234567890');
            $otp = substr($random, 0, 6);
            $mailData = array('name' => Auth::user()->name, 'userId' => Auth::user()->login_id, 'email' => Auth::user()->email, 'amount' => $request->withdrawAmount, 'otp' => $otp);

            Mail::send('mail.withdrawal-request-otp', $mailData, function ($message) use ($mailData) {
                $message->to($mailData['email'], $mailData['name'])->subject('Withdrawal Request OTP');
                $message->from(config('mail.from.address'), config('mail.from.name'));
            });
            
            return view('customer.withdraw-working-otp')->with(["otp" => Crypt::encrypt($otp), 'withdrawAmount' => $request->withdrawAmount]);
        }
    }

    public function withdrawRoiReqSendOTP(Request $request) {
        $request->validate([
            'withdrawAmount' => ['required','numeric','min:10']
        ]);

        $userId = Auth::user()->id;

        if ($request->withdrawAmount > Auth::user()->working_wallet_amount) {
            return back()->withErrors([
                'activationUserId' => "You don't have sufficient balance in working wallet to withdraw.",
            ]);
        } else {
            $random = str_shuffle('1234567890');
            $otp = substr($random, 0, 6);
            $mailData = array('name' => Auth::user()->name, 'userId' => Auth::user()->login_id, 'email' => Auth::user()->email, 'amount' => $request->withdrawAmount, 'otp' => $otp);

            Mail::send('mail.withdrawal-request-otp', $mailData, function ($message) use ($mailData) {
                $message->to($mailData['email'], $mailData['name'])->subject('Withdrawal Request OTP');
                $message->from(config('mail.from.address'), config('mail.from.name'));
            });
            
            return view('customer.withdraw-roi-otp')->with(["otp" => Crypt::encrypt($otp), 'withdrawAmount' => $request->withdrawAmount]);
        }
    }

    public function withdrawWorkingProfitSave(Request $request) {
        $request->validate([
            'withdrawAmount' => ['required','numeric','min:10'],
            'withdrawalOTPEncrypted' => ['required'],
            'withdrawalOTP' => ['required'],
        ]);

        $userId = Auth::user()->id;

        if ($request->withdrawalOTP != Crypt::decrypt($request->withdrawalOTPEncrypted)) {
            return redirect('customer/withdrawal/working-profit')->withErrors([
                'withdrawalOTP' => "You've entered invalid OTP. Try Again!",
            ]);
        } else if ($request->withdrawAmount > Auth::user()->working_wallet_amount) {
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

            $mailData = array('name' => Auth::user()->name, 'userId' => Auth::user()->login_id, 'email' => Auth::user()->email, 'amount' => $request->withdrawAmount, 'wallet_name' => 'working');

            Mail::send('mail.withdrawal-request', $mailData, function ($message) use ($mailData) {
                $message->to($mailData['email'], $mailData['name'])->subject('New Withdrawal Request - Working Wallet');
                $message->from(config('mail.from.address'), config('mail.from.name'));
            });

            return redirect('customer/withdrawal/working-profit')->with('success', 'Withdrawal request sent successfully.');
        }
    }

    public function withdrawRoiProfit() {
        return view('customer.withdraw-roi-profit');
    }

    public function withdrawRoiProfitSave(Request $request) {
        $request->validate([
            'withdrawAmount' => ['required','numeric','min:10'],
            'withdrawalOTPEncrypted' => ['required'],
            'withdrawalOTP' => ['required'],
        ]);

        $userId = Auth::user()->id;

        if ($request->withdrawalOTP != Crypt::decrypt($request->withdrawalOTPEncrypted)) {
            return redirect('customer/withdrawal/roi-profit')->withErrors([
                'withdrawalOTP' => "You've entered invalid OTP. Try Again!",
            ]);
        } else if ($request->withdrawAmount > Auth::user()->roi_wallet_amount) {
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

            $mailData = array('name' => Auth::user()->name, 'userId' => Auth::user()->login_id, 'email' => Auth::user()->email, 'amount' => $request->withdrawAmount, 'wallet_name' => 'ROI');

            Mail::send('mail.withdrawal-request', $mailData, function ($message) use ($mailData) {
                $message->to($mailData['email'], $mailData['name'])->subject('New Withdrawal Request - ROI Wallet');
                $message->from(config('mail.from.address'), config('mail.from.name'));
            });

            return redirect('customer/withdrawal/roi-profit')->with('success', 'Withdrawal request sent successfully.');
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
