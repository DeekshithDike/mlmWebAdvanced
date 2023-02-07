<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DirectIncome;
use Auth;

class CommonController extends Controller
{
    public function index() {
        if (Auth::user()->user_role == "USER") {
            return redirect()->route('customerDashboard');
        }
        return redirect()->route('adminDashboard');
    }

    public function testcron() {
        DirectIncome::addDirectIncome([
            'users_id' => 433,
            'referred' => 'KM3422243',
            'amount' => 500,
            'status' => "PAID"
        ]);
        return 0;
    }
}
