<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RewardHistory;
use Auth;

class RewardController extends Controller
{
    public function rewardHistory() {
        $filter = [
            "users_id" => Auth::user()->id,
        ];
        $data = RewardHistory::viewRewardHistory($filter);
        return view('customer.reward-history')->with(["data" => $data]);
    }
}
