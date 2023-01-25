<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DirectIncome;
use App\Models\RoiIncome;
use App\Models\BinaryIncome;
use App\Models\User;

class ProfitController extends Controller
{
    public function directMemberProfit() {
        $filter = [];
        $data = DirectIncome::viewDirectIncome($filter);
        return view('admin.direct-members-profit')->with(["data" => $data]);
    }

    public function roiIncomeProfit() {
        $filter = [];
        $data = RoiIncome::viewRoiIncome($filter);
        return view('admin.roi-income-profit')->with(["data" => $data]);
    }

    public function binaryProfit() {
        $filter = [
            "status" => "PAID"
        ];
        $data = BinaryIncome::viewBinaryIncome($filter);
        return view('admin.binary-profit')->with(["data" => $data]);
    }
}
