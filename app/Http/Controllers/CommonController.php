<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class CommonController extends Controller
{
    public function index() {
        if (Auth::user()->user_role == "USER") {
            return redirect()->route('customerDashboard');
        }
        return redirect()->route('adminDashboard');
    }
}
