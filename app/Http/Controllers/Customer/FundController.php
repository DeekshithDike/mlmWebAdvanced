<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FundHistory;
use App\Models\User;
use App\Models\CoinbaseCharges;
use App\Library\Coinbase\Charges;
use Auth;
use DataTables;
use Hexters\CoinPayment\CoinPayment;

class FundController extends Controller
{
    public function addFund() {
        return view('customer.add-fund');
    }

    public function addFundSave(Request $request) {
        $request->validate([
            'fundAmount' => ['required','numeric','min:1']
        ]);

        $userId = Auth::user()->id;

        $order_id = uniqid("km_", TRUE);
        $transaction['order_id'] = $order_id; // invoice number
        $transaction['amountTotal'] = (FLOAT) $request->fundAmount;
        $transaction['note'] = 'Krypto Musk - Add Fund';
        $transaction['buyer_name'] = Auth::user()->name;
        $transaction['buyer_email'] = Auth::user()->email;
        $transaction['redirect_url'] = url('/customer/fund/pending'); // When Transaction was comleted
        $transaction['cancel_url'] = url('/customer/fund/create'); // When user click cancel link
        $transaction['items'][] = [
            'itemDescription' => 'Krypto Musk',
            'itemPrice' => (FLOAT) $request->fundAmount, // USD
            'itemQty' => (INT) 1,
            'itemSubtotalAmount' => (FLOAT) $request->fundAmount // USD
        ];

        $url = CoinPayment::generatelink($transaction);

        // $chargeResponse = self::createCharge([
        //     "description" => "Payment for adding fund to account wallet.",
        //     "userId" => Auth::user()->login_id,
        //     "name" =>Auth::user()->name,
        //     "email" =>Auth::user()->email,
        //     "mobileNo" =>Auth::user()->mobile_no,
        //     "sponsorId" =>Auth::user()->sponsor_id,
        //     "position" =>Auth::user()->position,
        //     "actualAmount" => $request->fundAmount,
        //     "redirect_url" => config('app.url')."/customer/fund/pending",
        //     "cancel_url" => config('app.url')."/customer/fund/create"
        // ]);

        // $coinbaseChargeId = CoinbaseCharges::addCoinbaseCharges([
        //     'users_id' => $userId,
        //     'payment_for' => "ADD_FUND",
        //     'charges_id' => $chargeResponse['id'],
        //     'charges_code' => $chargeResponse['code'],
        //     'latest_status' => 'NEW'
        // ]);
        
        FundHistory::addFundHistory([
            'order_id' => $order_id,
            'users_id' => $userId,
            'amount' => $request->fundAmount,
            'fund_status' => "PENDING",
            'payment_url' => $url,
            'created_by' => Auth::user()->id
        ]);

        return redirect($url);
        // return redirect($chargeResponse['hosted_url']);
    }

    public function listPendingFund(Request $request) {
        $filter = [
            'userId' => Auth::user()->id,
            'status' => "PENDING"
        ];
        $data = FundHistory::getAllFundHistory($filter);
        return view('customer.pending-fund-list')->with(["data" => $data]);
    }

    public function listConfirmedFund() {
        $filter = [
            'userId' => Auth::user()->id,
            'status' => "CONFIRMED"
        ];
        $data = FundHistory::getAllFundHistory($filter);
        return view('customer.confirmed-fund-list')->with(["data" => $data]);
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
}
