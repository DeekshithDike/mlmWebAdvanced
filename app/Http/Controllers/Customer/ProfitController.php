<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DirectIncome;
use App\Models\RoiIncome;
use App\Models\BinaryIncome;
use App\Models\User;
use Auth;

class ProfitController extends Controller
{
    public function directMemberProfit() {
        $userId = Auth::user()->id;

        $filter = [
            "users_id" => $userId,
        ];
        $data = DirectIncome::viewDirectIncome($filter);
        return view('customer.direct-members-profit')->with(["data" => $data]);
    }

    public function roiIncomeProfit() {
        $userId = Auth::user()->id;

        $filter = [
            "users_id" => $userId,
        ];
        $data = RoiIncome::viewRoiIncome($filter);
        return view('customer.roi-income-profit')->with(["data" => $data]);
    }

    public function binaryProfit() {
        $userId = Auth::user()->id;

        $filter = [
            "users_id" => $userId,
            "status" => "PAID"
        ];
        $data = BinaryIncome::viewBinaryIncome($filter);
        return view('customer.binary-profit')->with(["data" => $data]);
    }
}
