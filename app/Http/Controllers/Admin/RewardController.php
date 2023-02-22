<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RewardHistory;
use Auth;

class RewardController extends Controller
{
    public function rewardHistory() {
        $filter = [];
        $data = RewardHistory::viewRewardHistory($filter);
        return view('admin.reward-history')->with(["data" => $data]);
    }
}
