<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CoinpaymentController extends Controller
{
    public function listCoinpaymentReport() {
        // $data = CoinbaseCharges::viewCoinbaseCharges();
        $data = DB::table('users')
                ->select('users.login_id', 'users.name', 'users.email', 'coinpayment_transactions.order_id', 'coinpayment_transactions.txn_id', 'coinpayment_transactions.address', 'coinpayment_transactions.amount_total_fiat','coinpayment_transactions.coin', 'coinpayment_transactions.status_url', 'coinpayment_transactions.created_at', 'coinpayment_transactions.type')
                ->join('fund_histories', 'users.id', '=', 'fund_histories.users_id')
                ->join('coinpayment_transactions', 'fund_histories.order_id', '=', 'coinpayment_transactions.order_id')
                ->where('coinpayment_transactions.type', 'coins')
                ->orderBy('coinpayment_transactions.created_at', 'desc')
                ->get();
        return view('admin.coinpayment-report')->with(['data' => $data]);
    }
}
