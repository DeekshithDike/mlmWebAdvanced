<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BinaryIncome;
use App\Models\RoiIncome;
use App\Models\DirectIncome;
use App\Models\User;
use App\Models\WithdrawalHistory;
use App\Models\ActivationHistory;
use App\Models\FundHistory;

class DashboardController extends Controller
{
    public function viewDashboard() {
        $totalUsers = User::where(["user_role" => "USER"])->count();
        $activeUsers = User::where(["user_role" => "USER", "login_status" => 1])->count();
        $blockedUsers = User::where(["user_role" => "USER", "login_status" => 0])->count();
        $pendingWithdrawal = WithdrawalHistory::where(["withdrawal_status" => "PENDING"])->count();
        $pendingFundRequest = FundHistory::where(["fund_histories.fund_status" => "PENDING"])
                                ->join('coinpayment_transactions', 'fund_histories.order_id', '=', 'coinpayment_transactions.order_id')->count();
        $totalDirectIncome = DirectIncome::where(["status" => "PAID"])->sum('amount');
        $totalBinaryIncome = BinaryIncome::where(["status" => "PAID"])->sum('paid_amount');
        $totalRoiIncome = RoiIncome::sum('paid_amount');
        $totalIncome = $totalDirectIncome + $totalBinaryIncome + $totalRoiIncome;
        $totalUsersAccountWalletBalance = User::where(["user_role" => "USER"])->sum('fund_wallet_amount');
        $totalUsersPurchaseWalletBalance = ActivationHistory::where(["activation_status" => "ACTIVATED"])->sum('activation_amount');
        
        $roiWalletTotal = User::where("user_role", '=', "USER")->where("roi_wallet_amount", '>', 20)->sum('roi_wallet_amount');
        $workingWalletTotal = User::where("user_role", '=', "USER")->where("working_wallet_amount", '>', 20)->sum('working_wallet_amount');
        $upcomingWithdrawal = $roiWalletTotal + $workingWalletTotal;

        $totalBinaryIncome = BinaryIncome::getBinaryIncomeSum([]);
        $totalRoiIncome = RoiIncome::getRoiIncomeSum([]);
        $totalDirectIncome = DirectIncome::getDirectIncomeSum([]);

        return view('admin.dashboard')->with([
            'totalUsers' => $totalUsers,
            'activeUsers' => $activeUsers,
            'blockedUsers' => $blockedUsers,
            'pendingWithdrawal' => $pendingWithdrawal,
            'pendingFundRequest' => $pendingFundRequest,
            'totalDirectIncome' => $totalDirectIncome,
            'totalBinaryIncome' => $totalBinaryIncome,
            'totalRoiIncome' => $totalRoiIncome,
            'totalIncome' => $totalIncome,
            'totalUsersAccountWalletBalance' => $totalUsersAccountWalletBalance,
            'totalUsersPurchaseWalletBalance' => $totalUsersPurchaseWalletBalance,
            'upcomingWithdrawal' => $upcomingWithdrawal
        ]);
    }
}
